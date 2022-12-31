const form = document.getElementById('form')
const name = document.getElementById('name ')
const email = document.getElementById('email')
const telefone = document.getElementById('telefone')
const data = document.getElementById('data')
const hora = document.getElementById('hora')


function checkList() {
    const nameValue = name.value.trim()
    const emailValue = email.value.trim()
    const telefoneValue = telefone.value.trim()
    const datalValue = data.value.trim()
    const horaValue = hora.value.trim()
}