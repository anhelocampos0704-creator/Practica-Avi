(function() {
      const searchInput = document.getElementById('searchInput');
      const clearSearch = document.getElementById('clearSearch');
      const catPills = document.querySelectorAll('.filter-pill');
      const skinPills = document.querySelectorAll('.skin-filter-chip');
      const products = document.querySelectorAll('.product-item');
      const resultCount = document.getElementById('resultCount');
      const emptyState = document.getElementById('emptyCatalogState');
      const resetBtn = document.getElementById('resetFiltersBtn');
      const wishlistBtns = document.querySelectorAll('.wishlist-btn');

      let currentCat = 'all';
      let currentSkin = 'all';
      let currentSearch = '';

      function filterCatalog() {
        let visible = 0;
        products.forEach(el => {
          const cat = el.getAttribute('data-category') || '';
          const skin = el.getAttribute('data-skin') || '';
          const text = el.innerText.toLowerCase();

          const matchCat = (currentCat === 'all' || cat.includes(currentCat));
          const matchSkin = (currentSkin === 'all' || skin.includes(currentSkin));
          const matchSearch = (!currentSearch || text.includes(currentSearch));

          if (matchCat && matchSkin && matchSearch) {
            el.style.display = 'flex';
            visible++;
          } else {
            el.style.display = 'none';
          }
        });

        if (resultCount) resultCount.innerText = visible;
        if (emptyState) {
          if (visible === 0) {
            emptyState.classList.remove('hidden');
          } else {
            emptyState.classList.add('hidden');
          }
        }
      }

      catPills.forEach(pill => {
        pill.addEventListener('click', () => {
          catPills.forEach(p => {
            p.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm');
            p.classList.add('bg-surface-container', 'text-on-surface-variant');
          });
          pill.classList.remove('bg-surface-container', 'text-on-surface-variant');
          pill.classList.add('bg-primary', 'text-on-primary', 'shadow-sm');
          currentCat = pill.getAttribute('data-cat') || 'all';
          filterCatalog();
        });
      });

      skinPills.forEach(chip => {
        chip.addEventListener('click', () => {
          skinPills.forEach(c => {
            c.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm');
            c.classList.add('bg-surface-container', 'text-on-surface-variant');
          });
          chip.classList.remove('bg-surface-container', 'text-on-surface-variant');
          chip.classList.add('bg-primary', 'text-on-primary', 'shadow-sm');
          currentSkin = chip.getAttribute('data-skin') || 'all';
          filterCatalog();
        });
      });

      if (searchInput) {
        searchInput.addEventListener('input', (e) => {
          currentSearch = e.target.value.trim().toLowerCase();
          if (clearSearch) {
            if (currentSearch.length > 0) {
              clearSearch.classList.remove('hidden');
              clearSearch.classList.add('flex');
            } else {
              clearSearch.classList.add('hidden');
              clearSearch.classList.remove('flex');
            }
          }
          filterCatalog();
        });
      }

      if (clearSearch) {
        clearSearch.addEventListener('click', () => {
          if (searchInput) searchInput.value = '';
          currentSearch = '';
          clearSearch.classList.add('hidden');
          clearSearch.classList.remove('flex');
          filterCatalog();
        });
      }

      if (resetBtn) {
        resetBtn.addEventListener('click', () => {
          if (searchInput) searchInput.value = '';
          currentSearch = '';
          currentCat = 'all';
          currentSkin = 'all';

          catPills.forEach((p, idx) => {
            if (idx === 0) {
              p.classList.add('bg-primary', 'text-on-primary', 'shadow-sm');
              p.classList.remove('bg-surface-container', 'text-on-surface-variant');
            } else {
              p.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm');
              p.classList.add('bg-surface-container', 'text-on-surface-variant');
            }
          });

          skinPills.forEach((c, idx) => {
            if (idx === 0) {
              c.classList.add('bg-primary', 'text-on-primary', 'shadow-sm');
              c.classList.remove('bg-surface-container', 'text-on-surface-variant');
            } else {
              c.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm');
              c.classList.add('bg-surface-container', 'text-on-surface-variant');
            }
          });

          filterCatalog();
        });
      }

      wishlistBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
          e.stopPropagation();
          const icon = btn.querySelector('.material-symbols-outlined');
          const isFilled = icon.style.fontVariationSettings && icon.style.fontVariationSettings.includes('FILL 1');
          if (isFilled) {
            icon.style.fontVariationSettings = "'FILL' 0";
            btn.classList.remove('text-primary');
            btn.classList.add('text-on-surface');
          } else {
            icon.style.fontVariationSettings = "'FILL' 1";
            btn.classList.remove('text-on-surface');
            btn.classList.add('text-primary');
          }
        });
      });

      const sortBtn = document.getElementById('sortToggleBtn');
      const sortLabel = document.getElementById('currentSortLabel');
      const sortModes = ['Relevancia', 'Precio: Menor', 'Precio: Mayor', 'Mejor valorados'];
      let sortIdx = 0;

      if (sortBtn && sortLabel) {
        sortBtn.addEventListener('click', () => {
          sortIdx = (sortIdx + 1) % sortModes.length;
          sortLabel.innerText = sortModes[sortIdx];
        });
      }
    })();
