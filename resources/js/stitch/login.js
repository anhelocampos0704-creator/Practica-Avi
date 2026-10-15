(function() {
    // Password toggle interaction
    const toggleBtn = document.getElementById('toggle-password-btn');
    const pwdInput = document.getElementById('password-field');
    const eyeIcon = document.getElementById('password-eye-icon');

    if (toggleBtn && pwdInput && eyeIcon) {
      toggleBtn.addEventListener('click', function() {
        const isPassword = pwdInput.type === 'password';
        pwdInput.type = isPassword ? 'text' : 'password';
        eyeIcon.textContent = isPassword ? 'visibility_off' : 'visibility';
      });
    }

  })();
