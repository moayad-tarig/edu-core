import Alpine from 'alpinejs';

Alpine.store('auth', {
    show: false,

    toggle() {
        this.show = !this.show;
        console.log('Password visibility toggled:', this.show);
    },
});

Alpine.start();

// Get the element from the DOM
const password = document.querySelector('#password');

