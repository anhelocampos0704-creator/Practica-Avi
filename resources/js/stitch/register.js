const toggleButton = document.getElementById('togglePassword');
const passwordInput = document.getElementById('password');
const eyeIcon = document.getElementById('eyeIcon');

if (toggleButton && passwordInput && eyeIcon) {
    toggleButton.addEventListener('click', () => {
        const shouldShowPassword = passwordInput.type === 'password';

        passwordInput.type = shouldShowPassword ? 'text' : 'password';
        eyeIcon.textContent = shouldShowPassword ? 'visibility_off' : 'visibility';
        toggleButton.setAttribute('aria-pressed', String(shouldShowPassword));
        toggleButton.setAttribute(
            'aria-label',
            shouldShowPassword ? 'Ocultar contraseña' : 'Mostrar contraseña',
        );
    });
}

const skinChips = document.querySelectorAll('.skin-chip');

skinChips.forEach((chip) => {
    chip.addEventListener('click', () => {
        skinChips.forEach((otherChip) => {
            otherChip.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm');
            otherChip.classList.add('bg-surface-container', 'text-on-surface-variant');
            otherChip.setAttribute('aria-pressed', 'false');
        });

        chip.classList.remove('bg-surface-container', 'text-on-surface-variant');
        chip.classList.add('bg-primary', 'text-on-primary', 'shadow-sm');
        chip.setAttribute('aria-pressed', 'true');
    });
});

const submitButton = document.getElementById('btnSubmit');

submitButton?.addEventListener('click', () => {
    submitButton.classList.add('opacity-90');
    setTimeout(() => submitButton.classList.remove('opacity-90'), 300);
});
