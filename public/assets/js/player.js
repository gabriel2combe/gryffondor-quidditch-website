let cards = document.getElementsByClassName('custom-card');
for (const key in cards ) {
    cards[key].addEventListener('click', function() {
        this.classList.toggle("clicked");
    });
}
