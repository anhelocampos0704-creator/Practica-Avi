(function() {
    const concernPills = document.querySelectorAll('.concern-pill');
    const concernsNotice = document.getElementById('concernsNotice');
    const maximumConcerns = 3;

    concernPills.forEach(pill => {
      pill.addEventListener('click', () => {
        const isSelected = pill.getAttribute('data-selected') === 'true';

        if (!isSelected && document.querySelectorAll('.concern-pill[data-selected="true"]').length >= maximumConcerns) {
          if (concernsNotice) {
            concernsNotice.textContent = 'Puedes seleccionar hasta tres preocupaciones.';
          }

          return;
        }

        if (isSelected) {
          pill.setAttribute('data-selected', 'false');
          pill.setAttribute('aria-pressed', 'false');
          pill.classList.remove('bg-primary', 'text-on-primary');
          pill.classList.add('bg-surface-container-lowest', 'text-on-surface');
          const icon = pill.querySelector('.material-symbols-outlined');
          if (icon) icon.textContent = 'add';
        } else {
          pill.setAttribute('data-selected', 'true');
          pill.setAttribute('aria-pressed', 'true');
          pill.classList.remove('bg-surface-container-lowest', 'text-on-surface');
          pill.classList.add('bg-primary', 'text-on-primary');
          const icon = pill.querySelector('.material-symbols-outlined');
          if (icon) icon.textContent = 'check';
        }

        if (concernsNotice) {
          concernsNotice.textContent = '';
        }
      });
    });
  })();
