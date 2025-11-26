<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Data Card Container */
        .data-card {
            background: linear-gradient(135deg, #ffffff 0%, #f7f9fc 100%);
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 30px;
            transition: all 0.3s ease;
        }

        .dark .data-card {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
        }

        /* Form Labels */
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .dark .form-label {
            color: #d1d5db;
        }

        /* Form Inputs */
        .form-input-styled {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 0.9375rem;
            color: #1f2937;
            background-color: #ffffff;
            transition: all 0.3s ease;
        }

        .form-input-styled:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }

        .dark .form-input-styled {
            background-color: #374151;
            border-color: #4b5563;
            color: #f3f4f6;
        }

        .dark .form-input-styled:focus {
            border-color: #60a5fa;
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.1);
        }

        /* Primary Button */
        .btn-primary {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9375rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.4);
        }

        /* Secondary Button */
        .btn-secondary {
            background-color: #f3f4f6;
            color: #374151;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9375rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
            cursor: pointer;
        }

        .btn-secondary:hover {
            background-color: #e5e7eb;
            transform: translateY(-1px);
        }

        .dark .btn-secondary {
            background-color: #374151;
            color: #d1d5db;
            border-color: #4b5563;
        }

        .dark .btn-secondary:hover {
            background-color: #4b5563;
        }

        /* Danger Button */
        .btn-danger {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9375rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(220, 38, 38, 0.3);
            border: none;
            cursor: pointer;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(220, 38, 38, 0.4);
        }

        /* Profile Container */
        .profile-container {
            max-width: 56rem;
            margin: 0 auto;
        }

        /* Spacing between cards */
        .space-y-6 > * + * {
            margin-top: 1.5rem;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .data-card {
                padding: 20px;
            }
            
            .btn-primary,
            .btn-secondary,
            .btn-danger {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <div class="py-6 sm:py-12">
        <div class="profile-container px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="data-card">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="data-card">
                @include('profile.partials.update-password-form')
            </div>

            <div class="data-card border-2 border-red-200 dark:border-red-900">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>