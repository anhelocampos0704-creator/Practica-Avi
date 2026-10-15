// Micro-interactions for Buttons, Wishlists and Toast Notification
  const toast = document.getElementById('toast');
  const toastMessage = document.getElementById('toast-message');

  function showToast(msg) {
    if (!toast) return;
    toastMessage.textContent = msg;
    toast.classList.remove('opacity-0', 'translate-y-3', 'pointer-events-none');
    toast.classList.add('opacity-100', 'translate-y-0');
    setTimeout(() => {
      toast.classList.remove('opacity-100', 'translate-y-0');
      toast.classList.add('opacity-0', 'translate-y-3', 'pointer-events-none');
    }, 2400);
  }

  // Quick Cart Add Interaction
  document.querySelectorAll('.add-to-cart-btn').forEach(button => {
    button.addEventListener('click', (e) => {
      e.preventDefault();
      const product = button.getAttribute('data-product') || 'Producto';
      button.classList.add('scale-90');
      setTimeout(() => button.classList.remove('scale-90'), 150);
      showToast(`${product} añadido a tu bolsa`);
    });
  });

  // Wishlist Heart Toggle
  document.querySelectorAll('.wishlist-toggle').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const icon = btn.querySelector('.material-symbols-outlined');
      const isFav = icon.textContent === 'favorite';
      icon.textContent = isFav ? 'favorite_border' : 'favorite';
      if (!isFav) {
        icon.style.fontVariationSettings = "'FILL' 1";
        btn.classList.add('text-primary');
        showToast('Guardado en tus favoritos botánicos');
      } else {
        icon.style.fontVariationSettings = "'FILL' 0";
        btn.classList.remove('text-primary');
      }
    });
  });

  // Hero Bookmark Ritual Toggle
  const bookmarkBtn = document.getElementById('bookmark-btn');
  const bookmarkIcon = document.getElementById('bookmark-icon');
  if (bookmarkBtn && bookmarkIcon) {
    bookmarkBtn.addEventListener('click', () => {
      const isSaved = bookmarkIcon.textContent === 'bookmark';
      bookmarkIcon.textContent = isSaved ? 'bookmark_border' : 'bookmark';
      if (!isSaved) {
        bookmarkIcon.style.fontVariationSettings = "'FILL' 1";
        showToast('Ritual diario guardado');
      } else {
        bookmarkIcon.style.fontVariationSettings = "'FILL' 0";
      }
    });
  }
