const buttons = document.querySelectorAll("[data-form]")
buttons.forEach( button => {
    button.addEventListener("click", function() {
        location.href = this.dataset.form;
    });
})