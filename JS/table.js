// SIDEBAR
const navShow = document.querySelector('header')
const navToggle = document.querySelector('header nav h1')

navToggle.addEventListener('click', () => {
    navShow.classList.toggle('slide')
})

// Detail Popup
const detailBtn = document.querySelectorAll('.table-page .table .data #popupBtn')
const detailPopup = document.querySelectorAll('.table-page .table .data #popupDetail')

detailBtn.forEach(el => {
    el.addEventListener('click', () => {
        detailPopup.classList.toggle('pop')
    })
})

// Tambah Popup
const tambahPopup = document.getElementById('tambahPopup')
const overlay = document.getElementById('overlay')
const tambahBtn = document.getElementById('tambahBtn')
const tambahClose = document.getElementById('close')

tambahBtn.addEventListener('click', () => {
    overlay.classList.add('tambah')
    tambahPopup.classList.add('tambah')
})

tambahClose.addEventListener('click', () => {
    overlay.classList.remove('tambah')
    tambahPopup.classList.remove('tambah')
})

// Update Popup
const updatePopup = document.getElementById('updatePopup')
const updateBtn = document.querySelectorAll('.update')
const updateClose = document.getElementById('close')

// updateBtn.addEventListener('click', () => {
//     overlay.classList.add('update');
//     updatePopup.classList.add('update');
// })

updateClose.addEventListener('click', () => {
    overlay.classList.remove('update');
    updatePopup.classList.remove('update');
})

updateBtn.forEach((el) => {
    el.addEventListener('click', () => {
        overlay.classList.add('update');
        updatePopup.classList.add('update');
    });
});