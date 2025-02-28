const button = document.querySelector('#contact');
button.addEventListener('click', () => {
    fetch('zoo/public/index?page=contact',{
        method: 'POST',
        body: new URLSearchParams({
            
        })
    });
});
