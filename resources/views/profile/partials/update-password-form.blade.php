<section class="profile-section">
    <header class="section-header">
        <div class="header-icon password-icon">
            <i class="fas fa-lock"></i>
        </div>
        <div class="header-content">
            <h2 class="section-title">{{ __('Update Password') }}</h2>
            <p class="section-description">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </div>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="profile-form">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="update_password_current_password" class="form-label">
                <i class="fas fa-key"></i>
                {{ __('Current Password') }}
            </label>
            <input id="update_password_current_password" 
                   name="current_password" 
                   type="password" 
                   class="form-input" 
                   autocomplete="current-password"
                   placeholder="Enter your current password" />
            @if($errors->updatePassword->get('current_password'))
                <p class="error-text">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ $errors->updatePassword->get('current_password')[0] }}
                </p>
            @endif
        </div>

        <div class="form-group">
            <label for="update_password_password" class="form-label">
                <i class="fas fa-lock"></i>
                {{ __('New Password') }}
            </label>
            <input id="update_password_password" 
                   name="password" 
                   type="password" 
                   class="form-input" 
                   autocomplete="new-password"
                   placeholder="Enter your new password" />
            @if($errors->updatePassword->get('password'))
                <p class="error-text">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ $errors->updatePassword->get('password')[0] }}
                </p>
            @endif
        </div>

        <div class="form-group">
            <label for="update_password_password_confirmation" class="form-label">
                <i class="fas fa-check-circle"></i>
                {{ __('Confirm Password') }}
            </label>
            <input id="update_password_password_confirmation" 
                   name="password_confirmation" 
                   type="password" 
                   class="form-input" 
                   autocomplete="new-password"
                   placeholder="Confirm your new password" />
            @if($errors->updatePassword->get('password_confirmation'))
                <p class="error-text">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ $errors->updatePassword->get('password_confirmation')[0] }}
                </p>
            @endif
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="status-message"
                >
                    <i class="fas fa-check-circle"></i>
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>

<style>
.profile-section {
    background: #ffffff;
    border-radius: 12px;
    padding: 32px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    margin-bottom: 24px;
}

.section-header {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 32px;
    padding-bottom: 24px;
    border-bottom: 2px solid #f0f0f0;
}

.header-icon {
    flex-shrink: 0;
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #0d6efd 0%, #0052cc 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
}

.password-icon {
    background: linear-gradient(135deg, #0d6efd 0%, #0052cc 100%);
}

.header-content {
    flex: 1;
}

.section-title {
    font-size: 24px;
    font-weight: 700;
    color: #1a202c;
    margin: 0 0 8px 0;
}

.section-description {
    font-size: 14px;
    color: #718096;
    margin: 0;
    line-height: 1.6;
}

.profile-form {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    font-weight: 600;
    color: #2d3748;
    margin: 0;
}

.form-label i {
    color: #0d6efd;
    font-size: 16px;
}

.form-input {
    width: 100%;
    padding: 12px 16px;
    font-size: 15px;
    color: #2d3748;
    background: #ffffff;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    transition: all 0.2s ease;
    outline: none;
}

.form-input:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
}

.form-input::placeholder {
    color: #a0aec0;
}

.error-text {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    color: #e53e3e;
    margin: 4px 0 0 0;
}

.form-actions {
    display: flex;
    align-items: center;
    gap: 16px;
    padding-top: 8px;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    font-size: 15px;
    font-weight: 600;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    outline: none;
}

.btn-primary {
    background: linear-gradient(135deg, #0d6efd 0%, #0052cc 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(13, 110, 253, 0.4);
}

.btn-primary:active {
    transform: translateY(0);
}

.status-message {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    color: #059669;
    font-weight: 500;
    margin: 0;
}

@media (max-width: 640px) {
    .profile-section {
        padding: 24px 16px;
    }

    .section-header {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .form-actions {
        flex-direction: column;
        width: 100%;
    }

    .btn {
        width: 100%;
        justify-content: center;
    }
}
</style>