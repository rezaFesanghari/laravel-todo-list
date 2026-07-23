<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    public string $name = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: RouteServiceProvider::HOME);

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header class="flex items-center gap-3 mb-6">
        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-100 text-lg">
            📝
        </div>
        <div>
            <h2 class="text-lg font-bold text-gray-800">
                اطلاعات پروفایل
            </h2>
            <p class="mt-0.5 text-sm text-gray-500">
                نام و آدرس ایمیل حساب کاربری خودت رو ویرایش کن
            </p>
        </div>
    </header>

    <form wire:submit="updateProfileInformation" class="space-y-5">

        {{-- نام --}}
        <div>
            <x-input-label for="name" value="نام و نام خانوادگی" />
            <x-text-input
                wire:model="name"
                id="name"
                name="name"
                type="text"
                class="mt-1.5 block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 transition"
                required
                autofocus
                autocomplete="name"
            />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- ایمیل --}}
        <div>
            <x-input-label for="email" value="آدرس ایمیل" />
            <x-text-input
                wire:model="email"
                id="email"
                name="email"
                type="email"
                class="mt-1.5 block w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 transition"
                required
                autocomplete="username"
            />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div class="mt-3 rounded-xl bg-amber-50 border border-amber-200 p-4">
                    <p class="text-sm text-amber-800 flex items-start gap-2">
                        <span>⚠️</span>
                        <span>
                            ایمیل شما هنوز تایید نشده است.
                            <button
                                wire:click.prevent="sendVerification"
                                class="underline font-medium text-amber-900 hover:text-amber-950 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500"
                            >
                                برای ارسال مجدد لینک تایید اینجا کلیک کنید
                            </button>
                        </span>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 flex items-center gap-1">
                            ✅ لینک تایید جدید به ایمیل شما ارسال شد.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- دکمه ذخیره --}}
        <div class="flex items-center gap-4 pt-2">
            <button
                type="submit"
                class="rounded-xl bg-gradient-to-l from-indigo-600 to-purple-600 text-white font-semibold px-6 py-2.5 hover:shadow-lg hover:shadow-indigo-200 hover:scale-[1.02] transition"
            >
                ذخیره تغییرات
            </button>

            <x-action-message class="text-green-600 text-sm font-medium flex items-center gap-1" on="profile-updated">
                ✅ با موفقیت ذخیره شد.
            </x-action-message>
        </div>
    </form>
</section>
