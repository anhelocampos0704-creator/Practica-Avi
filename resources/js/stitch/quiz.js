(function() {
    const options = document.querySelectorAll('.quiz-option input[type="radio"]');
    const nextBtn = document.getElementById('next-btn');

    options.forEach(radio => {
      radio.addEventListener('change', () => {
        if (nextBtn) {
          nextBtn.classList.add('scale-[1.02]');
          setTimeout(() => nextBtn.classList.remove('scale-[1.02]'), 150);
        }
      });
    });

    if (nextBtn) {
      nextBtn.addEventListener('click', () => {
        const selected = document.querySelector('.quiz-option input[type="radio"]:checked');
        const selectedText = selected ? selected.value : 'ninguna';
        nextBtn.innerHTML = `
          <span class="material-symbols-outlined text-[20px] animate-spin">autorenew</span>
          <span>Calibrando perfil...</span>
        `;
        setTimeout(() => {
          nextBtn.innerHTML = `
            <span>Siguiente Pregunta</span>
            <span class="material-symbols-outlined text-[20px]">eco</span>
          `;
        }, 600);
      });
    }
  })();
