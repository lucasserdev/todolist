const h4 = document.querySelectorAll('h4');

h4.forEach((item) => {
    item.addEventListener('click', (e) => {
        const form = e.target.closest('.todo').querySelector('form');
        
        if (form.style.display == 'none') {
            form.style.display = 'block';
            item.style.display = 'none';
        } else {
            form.style.display = 'none';
            item.style.display = 'block';
        }
    });
});

const btn_close = document.querySelectorAll('.todo form .btn_ac i');
btn_close.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        const form = e.target.closest('.todo').querySelector('form');
        const p = e.target.closest('.todo').querySelector('p');

        h4.forEach((botao) => {
            console.log(botao);
        }) 
        
        if (form.style.display == 'block') {
            form.style.display = 'none';
            h4.style.display = 'block';
        }
    });
});