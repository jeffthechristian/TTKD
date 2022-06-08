const navbutton = document.querySelector('.nav-button')
const menuOptions = document.querySelector('.menu-items')
const userOptions = document.querySelector('.user-options')
const menu = document.querySelector('.menu-bar')
let navOpened = false

navbutton.addEventListener('click', () => {
    if(navOpened){
        menuOptions.classList.remove('active')
        userOptions.classList.remove('active')
        navOpened = false
    }else{
        menuOptions.classList.add('active')
        userOptions.classList.add('active')
        navOpened = true
    }
})