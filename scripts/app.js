const editForm = document.querySelector('.profileinfotext-edit')
const editPass = document.querySelector('.profileinfotext-edit-password')
const infoForm = document.querySelector('.profileinfotext')
const editButton = document.querySelector('#edit-button')
const editButtonPassword = document.querySelector('#password-button')
let isEditing = false


editButton.addEventListener('click', () => {
    if(!isEditing){
        infoForm.style.display = 'none'
        editPass.style.display = 'none'
        editForm.style.display = 'block'
        editButton.textContent = 'Atcelt'
        isEditing = true
    }else if(isEditing){
        infoForm.style.display = 'flex'
        editForm.style.display = 'none'
        editPass.style.display = 'none'
        editButton.textContent = 'Labot profila informāciju'
        isEditing = false
    }

})

editButtonPassword.addEventListener('click', () => {
    if(!isEditing){
        infoForm.style.display = 'none'
        editForm.style.display = 'none'
        editPass.style.display = 'block'
        editButtonPassword.textContent = 'Atcelt'
        isEditing = true
    }else if(isEditing){
        infoForm.style.display = 'flex'
        editForm.style.display = 'none'
        editPass.style.display = 'none'
        editButtonPassword.textContent = 'Mainīt paroli'
        isEditing = false
    }

})