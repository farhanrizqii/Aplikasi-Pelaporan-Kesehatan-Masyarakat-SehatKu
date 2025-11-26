<section class="profile-section danger-section">
    <header class="section-header">
        <div class="header-icon danger-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="header-content">
            <h2 class="section-title">{{ __('Delete Account') }}</h2>
            <p class="section-description">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>
        </div>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="btn btn-danger"
    >
        <i class="fas fa-trash-alt"></i>
        {{ __('Delete Account') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="modal-form">
            @csrf
            @method('delete')

            <div class="modal-header">
                <div class="modal-icon">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <h2 class="modal-title">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>
                <p class="modal-description">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">
                    <i class="fas fa-key"></i>
                    {{ __('Password') }}
                </label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-input"
                    placeholder="{{ __('Password') }}"
                />

                @if($errors->userDeletion->get('password'))
                    <p class="error-text">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $errors->userDeletion->get('password')[0] }}
                    </p>
                @endif
            </div>

            <div class="modal-actions">
                <button type="button" 
                        x-on:click="$dispatch('close')"
                        class="btn btn-secondary">
                    <i class="fas fa-times"></i>
                    {{ __('Cancel') }}
                </button>

                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>

<style>
.profile-section {
    background: #ffffff;
    border-radius: 12px;
    padding: 32px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    margin-bottom: 24px;
}

.danger-section {
    border: 2px solid #fee;
    background: #fffafa;
}

.section-header {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 24px;
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

.danger-icon {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
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

.btn-danger {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
}

.btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(220, 53, 69, 0.4);
}

.btn-danger:active {
    transform: translateY(0);
}

.btn-secondary {
    background: #e2e8f0;
    color: #4a5568;
}

.btn-secondary:hover {
    background: #cbd5e0;
}

/* Modal Styles */
.modal-form {
    background: white;
    border-radius: 16px;
    padding: 32px;
    max-width: 500px;
    width: 100%;
}

.modal-header {
    text-align: center;
    margin-bottom: 32px;
}

.modal-icon {
    width: 64px;
    height: 64px;
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 32px;
    margin: 0 auto 20px;
}

.modal-title {
    font-size: 22px;
    font-weight: 700;
    color: #1a202c;
    margin: 0 0 12px 0;
}

.modal-description {
    font-size: 14px;
    color: #718096;
    line-height: 1.6;
    margin: 0;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-bottom: 24px;
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
    color: #dc3545;
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
    border-color: #dc3545;
    box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
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

.modal-actions {
    display: flex;
    gap: 12px;
    justify-content: flex-end;
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

    .btn {
        width: 100%;
        justify-content: center;
    }

    .modal-form {
        padding: 24px;
    }

    .modal-actions {
        flex-direction: column-reverse;
        gap: 8px;
    }

    .modal-actions .btn {
        width: 100%;
    }
}
</style>