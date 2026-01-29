console.log('hola')

const markAll=document.querySelector('#mark-all');
const numberElement=document.querySelector('#number');

markAll.addEventListener('click',()=>{
    const notReadElements= document.querySelectorAll('.not-read');
    
    notReadElements.forEach(notReadElements=>{
        notReadElements.classList.remove('not-read')
    })
    const notReadElementsActual=document.querySelectorAll('.not-read');
    numberElement.innerHTML= notReadElementsActual.length;
})