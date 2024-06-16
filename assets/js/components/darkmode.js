const darkmode = () => {
    const toggleTheme = document.querySelector('.toggleTheme');
    let body = document.querySelector('body');
    let nike2Section = document.querySelector('.nike2-section');
    let p = '';
    let feedback ='';
    console.log('hello');
    if (body.contains(nike2Section)) {
        p = nike2Section.querySelector('p');
        feedback = document.querySelector('.feedback');
    }
    let cardProduct = document.querySelector('.card-product');
   
  
    const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : 'light';
    if (currentTheme) {
      document.documentElement.setAttribute('data-theme', currentTheme);
      if (currentTheme === 'dark') {
       
        
        body.style.background = 'linear-gradient(360deg, #000000, #333366)';
        if (body.contains(nike2Section)) {
            nike2Section.style.color = 'white';
            p.style.color = 'white';
            feedback.style.color = 'white';
        }
        if (cardProduct) {
            cardProduct.color = 'black';
            let cardTitle = document.querySelectorAll('h5');
            let cardText = document.querySelectorAll('p');
            for (let i = 0; i < cardTitle.length; i++) {
                cardTitle[i].style.color = 'white';
                cardText[i].style.color = 'white'  
            }   
        }

        toggleTheme.classList.remove('fa-toggle-off');
        toggleTheme.classList.add('fa-toggle-on');
        

      } else {
        
        body.style.background = 'linear-gradient(360deg, #ffffff, #4b4bd2)';
        if (body.contains(nike2Section)) {
            nike2Section.style.color = 'black';
            p.style.color = 'black';
            feedback.style.color = 'black';
        }
        if (cardProduct) {
            cardProduct.color = 'black';
            let cardTitle = document.querySelectorAll('h5');
            let cardText = document.querySelectorAll('p');
            for (let i = 0; i < cardTitle.length; i++) {
                cardTitle[i].style.color = 'black';
                cardText[i].style.color = 'black'  
            }   
        }
        

        toggleTheme.classList.remove('fa-toggle-on');
        toggleTheme.classList.add('fa-toggle-on');
        toggleTheme.classList.add('fa-flip-horizontal');
      }
    }
  
    toggleTheme.addEventListener('click', () => {
        console.log('click');
      if (document.documentElement.getAttribute('data-theme') === 'dark') {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');

        body.style.background = 'linear-gradient(360deg, #ffffff, #4b4bd2)';
        if (body.contains(nike2Section)) {
            nike2Section.style.color = 'black';
            p.style.color = 'black';
            feedback.style.color = 'black';
        }
        if (cardProduct) {
            cardProduct.color = 'black';
            let cardTitle = document.querySelectorAll('h5');
            let cardText = document.querySelectorAll('p');
            for (let i = 0; i < cardTitle.length; i++) {
                cardTitle[i].style.color = 'black';
                cardText[i].style.color = 'black'  
            }   
        }

        toggleTheme.classList.add('fa-flip-horizontal');

      } else {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');

        body.style.background = 'linear-gradient(360deg, #000000, #333366)';
        if (body.contains(nike2Section)) {
            nike2Section.style.color = 'white';
            p.style.color = 'white';
            feedback.style.color = 'white';
        }
        if (cardProduct) {
            cardProduct.color = 'black';
            let cardTitle = document.querySelectorAll('h5');
            let cardText = document.querySelectorAll('p');
            for (let i = 0; i < cardTitle.length; i++) {
                cardTitle[i].style.color = 'white';
                cardText[i].style.color = 'white'  
            }   
        }

        toggleTheme.classList.remove('fa-flip-horizontal');
        toggleTheme.classList.add('fa-toggle-on');
      }
    });
  };
  
  export default darkmode;
  