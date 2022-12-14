<?php header('Content-type: text/css'); ?>
/*========= FONT FAMILY =========*/
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;800;900&family=Quicksand:wght@300;400;500;600;700&display=swap");

/*========= CSS VARIABLE =========*/
:root {
  --main-font: "Poppins";
  --main-color: #3175f9;
  --second-color: #2b2d34;
  --bg-color: #1d1d20;
  --text-dimmed: #848484;
  --light-text: #fff;
  --danger: #fd4d62;
  --box-color: #1d1f26;
}

/*========= CSS RESET =========*/
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: var(--main-font);
}

html {
  scroll-behavior: smooth;
}

body {
  background-color: var(--bg-color);
  overflow-x: hidden;
}

a {
  text-decoration: none;
}

ul,
li {
  list-style: none;
}

.active {
  color: var(--main-color);
  font-weight: 600;
}

/*========= MAIN STYLE =========*/

/* <<<<< Header >>>>> */
header {
  z-index: 100;
  padding: 20px;
  position: fixed;
  height: 100vh;
  width: 100px;
  left: 0;
  background-color: var(--main-color);
  transition: 300ms ease-in-out;
  overflow: hidden;
}

header nav {
  display: flex;
  align-items: flex-start;
  justify-content: center;
  margin: 0 auto;
  flex-direction: column;
  gap: 25px;
}

header nav .logo {
  padding: 15px 20px;
  border-radius: 10px;
}

header nav .logo:hover {
  background-color: var(--bg-color);
}

header nav .logo a {
  color: #fff;
}

header nav li a {
  display: flex;
  align-items: center;
  gap: 60px;
}

header nav li a i,
span {
  color: #fff;
  font-size: 22px;
  font-weight: 500;
}

header nav li a span {
  width: max-content;
  font-size: 18px;
}

header nav li {
  padding: 10px 20px;
  border-radius: 10px;
}

header nav li:hover {
  background-color: var(--bg-color);
}

header.slide {
  width: 320px;
  border-right: 2px solid var(--text-dimmed);
}

/* <<<<< Login Page >>>>> */
.wrapper {
  position: relative;
  width: 100%;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: var(--box-color);
}

.wrapper .pop-msg {
  background-color: var(--box-color);
  border: 2px solid var(--text-dimmed);
  padding: 30px 40px;
  border-radius: 10px;
  position: absolute;
  top: 30px;
  display: flex;
  gap: 20px;
  flex-direction: column;
  align-items: center;
  animation: slideDown 300ms ease-in forwards;
}

.wrapper .pop-msg p {
  font-size: 18px;
  font-weight: 500;
  color: var(--light-text);
}

.wrapper .pop-msg a {
  background-color: var(--main-color);
  color: var(--light-text);
  padding: 5px 100px;
  border-radius: 5px;
  transition: 100ms ease;
}

.wrapper .pop-msg a:hover {
  background-color: #5188f7;
}

.login-page {
  overflow: hidden;
  border-radius: 10px;
  height: 530px;
  width: 60%;
  background-color: var(--bg-color);
  display: grid;
  grid-template-columns: 1fr 1.3fr;
  box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.5);
}

.login-page .input-container {
  padding: 60px 40px;
  display: flex;
  flex-direction: column;
  gap: 25px;
}

.login-page .input-container h2 {
  color: var(--light-text);
  font-weight: 500;
  font-size: 20px;
}

.login-page .input-container h2 span {
  font-size: 20px;
}

.login-page .input-container h1 {
  color: var(--light-text);
  font-weight: 500;
  font-size: 25px;
}

.login-page .input-container form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.login-page .input-container form .input-box {
  display: flex;
  flex-direction: column;
}

.login-page .input-container form .input-box label {
  color: var(--text-dimmed);
  font-size: 15px;
}

.login-page .input-container form .input-box .content {
  display: grid;
  grid-template-columns: 15% 85%;
  border-radius: 8px;
  border: 2px solid var(--text-dimmed);
  padding: 5px 5px;
  align-items: center;
}

.login-page .input-container form .input-box .content i {
  color: var(--main-color);
  padding: 5px 10px;
  font-size: 12px;
}

.login-page .input-container form .input-box .content input {
  color: var(--light-text);
  background-color: transparent;
  border: none;
  width: 100%;
}

.login-page .input-container form .input-box .content input:focus {
  outline: none;
}

.login-page .input-container form button {
  cursor: pointer;
  background-color: var(--main-color);
  color: var(--light-text);
  font-weight: 500;
  border: none;
  padding: 10px 0;
  border-radius: 5px;
  transition: 100ms ease;
}

.login-page .input-container form button:hover {
  background-color: #5188f7;
}

.login-page .input-container p {
  color: var(--light-text);
  font-size: 14px;
}

.login-page .input-container p a {
  color: var(--main-color);
}

.login-page .input-container p a:hover {
  text-decoration: underline;
}

.login-page .img-container {
  background: url(../Assets/img/drug-pict.png) no-repeat center;
  background-size: cover;
  background-color: linear-gradient(134.03deg, rgba(0, 0, 0, 0) 20.34%, var(--bg-color) 81.64%);
  display: flex;
  align-items: center;
  justify-content: center;
}

/* <<<<< Register Page >>>>> */
.wrapper {
  width: 100%;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.register-page {
  overflow: hidden;
  border-radius: 10px;
  /* height: 580px; */
  width: 70%;
  background-color: var(--bg-color);
  display: grid;
  grid-template-columns: 1.3fr 1fr;
  box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.5);
  transform: scale(0.9);
}

.register-page .input-container {
  padding: 40px;
  display: flex;
  flex-direction: column;
  gap: 25px;
}

.register-page .input-container h2 {
  color: var(--light-text);
  font-weight: 500;
  font-size: 20px;
}

.register-page .input-container h2 span {
  font-size: 20px;
}

.register-page .input-container h1 {
  color: var(--light-text);
  font-weight: 500;
  font-size: 25px;
}

.register-page .input-container form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.register-page .input-container form .input-box {
  display: flex;
  flex-direction: column;
}

.register-page .input-container form .input-box label {
  color: var(--text-dimmed);
  font-size: 15px;
}

.register-page .input-container form .input-box .content {
  display: grid;
  grid-template-columns: 15% 85%;
  border-radius: 8px;
  border: 2px solid var(--text-dimmed);
  padding: 5px 5px;
  align-items: center;
}

.register-page .input-container form .input-box .content select {
  background-color: var(--box-color);
  border: none;
  color: var(--light-text);
}

.register-page .input-container form .input-box .valdi span {
  font-size: 12px;
  color: var(--danger);
  font-weight: 300;
}

.register-page .input-container form .input-box .content i {
  color: var(--main-color);
  padding: 5px 10px;
  font-size: 12px;
}

.register-page .input-container form .input-box .content input {
  color: var(--light-text);
  background-color: transparent;
  border: none;
  width: 100%;
}

.register-page .input-container form .input-box .content input:focus {
  outline: none;
}

.register-page .input-container form button {
  cursor: pointer;
  background-color: var(--main-color);
  color: var(--light-text);
  font-weight: 500;
  border: none;
  padding: 10px 0;
  border-radius: 5px;
  transition: 100ms ease;
}

.register-page .input-container form button:hover {
  background-color: #5188f7;
}

.register-page .input-container p {
  color: var(--light-text);
  font-size: 14px;
}

.register-page .input-container p a {
  color: var(--main-color);
}

.register-page .input-container p a:hover {
  text-decoration: underline;
}

.register-page .img-container {
  background: url(../Assets/img/doctor-pics.png) no-repeat center;
  background-size: cover;
  background-color: linear-gradient(134.03deg, rgba(0, 0, 0, 0) 20.34%, var(--bg-color) 81.64%);
  display: flex;
  align-items: center;
  justify-content: center;
}

/* <<<<< Dasboard Page >>>>> */
.dashboard-page {
  position: relative;
  padding-top: 30px;
  padding-left: 150px;
  padding-right: 50px;
  width: 100%;
  display: flex;
  flex-direction: column;
  height: 100vh;
  /* background-color: rgba(43, 45, 52, 0.5); */
  overflow: hidden;
}

.dashboard-page .shape {
  z-index: -1;
  position: absolute;
  width: 500px;
  height: 500px;
  border-radius: 50%;
  background-color: rgba(253, 77, 98, 0.5);
  opacity: 50%;
  filter: blur(20px);
}

.dashboard-page .shape.one,
.table-page .shape.one {
  left: -40px;
  top: -40px;
}

.dashboard-page .shape.two {
  right: -130px;
  bottom: -130px;
  background-color: rgba(49, 117, 249, 0.5);
  width: 500px;
  height: 500px;
}

.dashboard-page .dash-tittle {
  position: relative;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.dashboard-page .dash-tittle .profile-popup {
  visibility: hidden;
  opacity: 0;
  transform: translateY(-20px);
  position: absolute;
  display: flex;
  flex-direction: column;
  gap: 25px;
  right: 20px;
  bottom: -250px;
  background-color: var(--box-color);
  padding: 30px;
  border: 1px solid var(--text-dimmed);
  border-radius: 10px;
  transition: 200ms ease-in-out;
}
.dashboard-page .dash-tittle .profile-popup.show {
  visibility: visible;
  opacity: 1;
  transform: translateY(0px);
}

.dashboard-page .dash-tittle .profile-popup.user {
  bottom: -180px;
}

.dashboard-page .dash-tittle .profile-popup a {
  color: #fff;
  transition: 200ms all;
}
.dashboard-page .dash-tittle .profile-popup a:hover {
  transform: translateX(5px);
}

.dashboard-page .dash-tittle .profile-popup span {
  height: 1px;
  background-color: var(--text-dimmed);
}

.dashboard-page .dash-tittle .tittle {
  display: flex;
  flex-direction: column;
}

.dashboard-page .dash-tittle .tittle h1,
span {
  font-size: 25px;
}

.dashboard-page .dash-tittle .tittle h1,
h2 {
  font-size: 25px;
  color: var(--light-text);
  font-weight: 500;
}

.dashboard-page .dash-tittle .profile {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
  margin-right: 50px;
}

.dashboard-page .dash-tittle .profile img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
}

.dashboard-page .dash-tittle .profile a {
  color: var(--light-text);
  font-size: 20px;
  cursor: pointer;
}

.dashboard-page .dash-content {
  margin-top: 24px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.dashboard-page .dash-content h3 {
  color: #fff;
  font-weight: 500;
}

.dashboard-page .dash-content .dash-data {
  display: grid;
  grid-template-columns: 1fr 0.5fr;
  gap: 20px;
}

.dashboard-page .dash-content .dash-data .all-data {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.dashboard-page .dash-content .dash-data .all-data .total-data {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 15px;
}

.dashboard-page .dash-content .dash-data .all-data .total-data.--karyawan {
  grid-template-columns: repeat(2, 1fr);
}

.dashboard-page .dash-content .dash-data .all-data .total-data .data {
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 20px;
  padding: 20px;
  background-color: var(--second-color);
  height: 140px;
  border: 2px solid var(--text-dimmed);
  border-radius: 12px;
}

.dashboard-page .dash-content .dash-data .all-data .total-data .data i {
  color: var(--light-text);
  font-size: 35px;
}

.dashboard-page .dash-content .dash-data .all-data .total-data .data p {
  color: var(--light-text);
  font-size: 16px;
}

.dashboard-page .dash-content .dash-data .all-data .total-data .data p > span {
  font-size: 14px;
}

.dashboard-page .dash-content .dash-data .all-data .histori-tittle {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.dashboard-page .dash-content .dash-data .all-data .histori-tittle a {
  border: 2px solid var(--main-color);
  color: #fff;
  font-size: 14px;
  padding: 5px 15px;
  border-radius: 5px;
}

.dashboard-page .dash-content .dash-data .all-data .histori-data {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

/* TB Histori Transaksi */
.--tbdash {
  border-radius: 10px;
  border: 1px solid var(--text-dimmed);
  overflow: hidden;
  border-spacing: 0;
}

.--tbdash thead,
.--tbdash tbody {
  padding: 20px;
  background-color: var(--box-color);
}

.--tbdash tbody {
  background-color: var(--second-color);
}

.--tbdash thead td,
.--tbdash tbody td {
  padding: 10px 20px;
}

.--tbdash thead td {
  font-weight: 500;
  color: var(--light-text);
}

.--tbdash tbody td {
  color: var(--text-dimmed);
}

.--tbdash tbody td img {
  height: 60px;
  width: 90px;
}

.--tbdash tbody td:first-child {
  color: var(--light-text);
  font-weight: 500;
}

.--tbdash tbody .btn a {
  font-size: 14px;
  cursor: pointer;
  padding: 5px 15px;
  color: var(--light-text);
  border: none;
  background-color: var(--danger);
  border-radius: 5px;
  transition: 100ms ease-in-out;
  /* font-weight: 500; */
}
.--tbdash tbody .btn a:hover {
  opacity: 0.9;
}
.--tbdash tbody .btn .update {
  background-color: var(--main-color);
}

/* 
.dashboard-page .dash-content .dash-data .all-data .histori-data .data,
.table-page .table .data {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 20px;
  background-color: var(--second-color);
  border: 2px solid var(--text-dimmed);
  border-radius: 12px;
  color: var(--text-dimmed);
}

.dashboard-page .dash-content .dash-data .all-data .histori-data .data .profile,
.table-page .table .data .profile {
  display: flex;
  align-items: center;
  gap: 10px;
}

.dashboard-page .dash-content .dash-data .all-data .histori-data .data .profile .name p:first-child,
.table-page .table .data .profile .name p:first-child {
  color: var(--main-color);
  font-weight: 500;
}

.dashboard-page .dash-content .dash-data .all-data .histori-data .data .profile .name:last-child,
.table-page .table .data .profile .name:last-child {
  color: var(--text-dimmed);
}

.dashboard-page .dash-content .dash-data .all-data .histori-data .data button,
.table-page .table .data .btnTrans {
  cursor: pointer;
  background-color: var(--main-color);
  border: none;
  color: #fff;
  padding: 8px 38px;
  border-radius: 2px;
  transition: 100ms ease-in;
}

.dashboard-page .dash-content .dash-data .all-data .histori-data .data button:hover,
.table-page .table .data .btnTrans:hover {
  background-color: #5188f7;
} */

.dashboard-page .dash-content .dash-data .data-karyawan {
  padding: 20px 30px;
  border-radius: 15px;
  background-color: var(--second-color);
  border: 2px solid var(--text-dimmed);
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.dashboard-page .dash-content .dash-data .data-karyawan .karyawan {
  display: flex;
  align-items: center;
  gap: 15px;
}

.dashboard-page .dash-content .dash-data .data-karyawan .karyawan img {
  width: 50px;
}

.dashboard-page .dash-content .dash-data .data-karyawan .karyawan .name p:first-child {
  color: #fff;
}

.dashboard-page .dash-content .dash-data .data-karyawan .karyawan .name p:last-child {
  color: var(--text-dimmed);
}

.dashboard-page .dash-content .dash-data .data-karyawan .btn {
  display: flex;
  flex-direction: column;
  align-items: center;
  align-self: center;
  gap: 15px;
}

.dashboard-page .dash-content .dash-data .data-karyawan .btn a {
  cursor: pointer;
  background-color: var(--main-color);
  border: none;
  color: #fff;
  padding: 8px 38px;
  border-radius: 2px;
  width: 100%;
  text-align: center;
  transition: 100ms ease-in;
}
.dashboard-page .dash-content .dash-data .data-karyawan .btn a:hover {
  background-color: #5188f7;
}

.dashboard-page .dash-content .dash-data .data-karyawan .btn img {
  width: 250px;
}

/* <<<<< All Table Page >>>>> */
.table-page {
  position: relative;
  padding-top: 30px;
  padding-left: 150px;
  padding-right: 50px;
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 50px;
}

.table-page .shape {
  z-index: -1;
  position: absolute;
  width: 500px;
  height: 500px;
  border-radius: 50%;
  background-color: rgba(49, 117, 249, 0.5);
  opacity: 50%;
  filter: blur(20px);
}

.table-page .shape.two {
  right: -200px;
  bottom: -100px;
  background-color: rgba(253, 77, 98, 0.5);
  width: 500px;
  height: 500px;
}

.table-page .header {
  position: relative;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 2px solid var(--text-dimmed);
  padding-bottom: 30px;
}

.table-page .header .search-box {
  width: 70%;
  display: flex;
  gap: 5px;
}

.table-page .header .search-box input {
  width: 80%;
  background: transparent;
  border: 2px solid var(--text-dimmed);
  padding: 10px 20px;
  border-radius: 5px;
  color: #fff;
}

.table-page .header .search-box button {
  background-color: var(--main-color);
  border: none;
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  transition: 100ms ease-in-out;
}
.table-page .header .search-box button:hover {
  background-color: #5188f7;
}

.table-page .header .btn > button {
  cursor: pointer;
  color: #fff;
  border: none;
  background-color: var(--second-color);
  padding: 10px 20px;
  border-radius: 10px;
  transition: 100ms ease-in-out;
}
.table-page .header .btn > button:hover {
  background-color: #373a44;
}

.table-page .overlay {
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  visibility: hidden;
  opacity: 0;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 400;
  background-color: rgba(0, 0, 0, 0.5);
  height: 100vh;
  backdrop-filter: blur(10px);
  transition: 300ms ease;
}
.table-page .overlay.tambah {
  visibility: visible;
  opacity: 1;
}
.table-page .overlay.update {
  visibility: visible;
  opacity: 1;
}

.table-page .form-popup {
  visibility: hidden;
  opacity: 0;
  width: 40%;
  position: absolute;
  z-index: 500;
  background: var(--box-color);
  padding: 25px;
  border-radius: 10px;
  border: 1px solid var(--text-dimmed);
  display: flex;
  flex-direction: column;
  gap: 10px;
  transform: scale(0.9);
  transition: 300ms ease;
}
.table-page .form-popup.tambah {
  visibility: visible;
  opacity: 1;
}
.table-page .form-popup.update {
  visibility: visible;
  opacity: 1;
}

.table-page .form-popup h3 {
  font-weight: 500;
  color: #fff;
  border-bottom: 3px solid var(--text-dimmed);
  padding-bottom: 10px;
}

.table-page .form-popup form {
  display: flex;
  flex-direction: column;
  gap: 14px;
}

.table-page .form-popup form input {
  color: var(--light-text);
}

.table-page .form-popup form .input-box {
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.table-page .form-popup form .input-box label {
  color: #fff;
}

.table-page .form-popup form .input-box select,
input,
textarea {
  color: #fff;
  background: transparent;
  border: 1px solid #fff;
  padding: 5px 10px;
  border-radius: 5px;
  outline: none;
}

.table-page .form-popup form .input-box select option {
  background-color: var(--box-color);
}

.table-page .form-popup form .btn {
  display: flex;
  gap: 10px;
}

.table-page .form-popup form .btn button {
  cursor: pointer;
  padding: 10px 20px;
  border-radius: 5px;
  border: none;
  color: #fff;
  background-color: var(--danger);
  transition: 100ms ease-in-out;
}
.table-page .form-popup form .btn button:hover {
  background-color: #ff7484;
}

.table-page .form-popup form .btn .submit-btn {
  background-color: var(--main-color);
  transition: 100ms ease-in-out;
}
.table-page .form-popup form .btn .submit-btn:hover {
  background-color: #5188f7;
}

.table-page .table {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.table-page .table table {
  border-radius: 10px;
  border: 1px solid var(--text-dimmed);
  overflow: hidden;
  border-spacing: 0;
}

.table-page .table table thead,
.table-page .table table tbody {
  padding: 20px;
  background-color: var(--box-color);
}

.table-page .table table tbody {
  background-color: var(--second-color);
}

.table-page .table table thead td,
.table-page .table table tbody td {
  padding: 10px 20px;
}

.table-page .table table thead td {
  font-weight: 500;
  color: var(--light-text);
}

.table-page .table table tbody td {
  color: var(--text-dimmed);
}

.table-page .table table tbody td img {
  height: 60px;
  width: 90px;
}

.table-page .table table tbody td:first-child {
  color: var(--light-text);
  font-weight: 500;
}

.table-page .table table tbody .btn button {
  cursor: pointer;
  padding: 5px 10px;
  color: var(--light-text);
  border: none;
  background-color: var(--danger);
  border-radius: 5px;
  transition: 100ms ease-in-out;
  font-weight: 500;
}
.table-page .table table tbody .btn button:hover {
  opacity: 0.9;
}
.table-page .table table tbody .btn .update {
  background-color: var(--main-color);
}

/* Detail Transaksi Page */
.back-btn {
  position: fixed;
  top: 0;
  left: 0;
  color: var(--light-text);
  font-weight: bold;
  background-color: var(--main-color);
  padding: 20px;
  border-bottom-right-radius: 50%;
}

.tittle-detail {
  color: var(--light-text);
  text-align: center;
  margin: 20px 0;
  font-size: 24px;
}

.content-detail {
  display: flex;
  flex-direction: column;
  gap: 20px;
  margin: 0 200px;
}

.content-detail .data-nota {
  display: grid;
  grid-template-columns: 0.5fr 1fr;
  border-radius: 10px;
  overflow: hidden;
  border: 1px solid var(--box-color);
}

.content-detail .data-nota p {
  padding: 10px;
  border: 1px solid var(--box-color);
  background-color: #cac9c9;
  font-size: 12px;
  font-weight: 500;
}

.content-detail .data-nota .head {
  background-color: var(--main-color);
}

.content-detail .data-transaksi {
  border-radius: 15px;
  overflow: hidden;
  border: 1px solid var(--box-color);
}

.content-detail .data-transaksi thead {
  background-color: var(--main-color);
}

.content-detail .data-transaksi tbody {
  background-color: #cac9c9;
}

.content-detail .data-transaksi td {
  padding: 10px;
  font-size: 12px;
  font-weight: 500;
}

.content-detail > .btn {
  align-self: center;
  display: flex;
  gap: 20px;
}

.content-detail > .btn button {
  cursor: pointer;
  border: none;
  padding: 5px 20px;
  border-radius: 5px;
  color: var(--light-text);
  background-color: #3f3f3f;
  transition: 100ms all;
}
.content-detail > .btn #lihatTrans {
  background-color: var(--main-color);
}
.content-detail > .btn button:hover {
  opacity: 0.8;
}

.content-detail .form-data {
  width: 60%;
  align-self: center;
  display: flex;
  flex-direction: column;
  padding: 30px 50px;
  border: 1px solid var(--text-dimmed);
  border-radius: 10px;
  gap: 10px;
}

.content-detail .form-data img {
  align-self: center;
  width: 200px;
  height: 200px;
}

.content-detail .form-data .input-box {
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.content-detail .form-data .input-box label {
  color: var(--light-text);
}

.content-detail .form-data .input-box select,
input {
  color: #fff;
  background: transparent;
  border: 1px solid var(--text-dimmed);
  padding: 5px 10px;
  border-radius: 5px;
  outline: none;
}

.content-detail .form-data .input-box select option {
  background-color: var(--box-color);
}

.content-detail .form-data .btn {
  align-self: center;
  display: flex;
  gap: 10px;
}

.content-detail .form-data .btn input[type="submit"] {
  cursor: pointer;
  padding: 5px 15px;
  border-radius: 5px;
  border: none;
  color: #fff;
  background-color: #3f3f3f;
  transition: 100ms ease-in-out;
}
.content-detail .form-data .btn input[type="submit"]:hover {
  background-color: #525252;
}

.content-detail .form-data .btn input[type="submit"]:last-child {
  background-color: var(--main-color);
  transition: 100ms ease-in-out;
}
.content-detail .form-data .btn input[type="submit"]:last-child:hover {
  background-color: #5188f7;
}

/*========= RESPONSIVE =========*/
/* Tablet */
@media screen and (max-width: 820px) {
  /* Login Page */
  .login-page {
    width: 90%;
    grid-template-columns: 1fr;
  }

  .login-page .img-container {
    display: none;
  }

  /* Register Page */
  .register-page {
    width: 90%;
    grid-template-columns: 1fr;
  }

  .register-page .img-container {
    display: none;
  }
}

/* Mobile L */
@media screen and (max-width: 480px) {
  /* Pop Up Messagge */
  .wrapper .pop-msg {
    padding: 20px;
  }

  .wrapper .pop-msg p {
    text-align: center;
  }
}

/* Mobile S */
@media screen and (max-width: 320px) {
  /* Pop Up Messagge */
  .wrapper .pop-msg {
    padding: 20px 5px;
  }

  .wrapper .pop-msg p {
    font-size: 15px;
    width: 80%;
  }

  .wrapper .pop-msg a {
    padding: 5px 50px;
  }

  /* Login Page */
  .login-page {
    width: 100%;
    height: 100vh;
  }

  /* Register Page */
  .register-page {
    width: 100%;
    height: 100vh;
  }
}

/*========= PRINT =========*/
@media print {
  header {
    display: none;
  }

  .table-page {
    padding: 0;
  }

  .table-page .header {
    display: none;
  }

  .table-page .table {
    transform: scale(0.9);
  }

  .table-page .table table {
    width: 100%;
    border-radius: 0;
  }

  .table-page .table table thead td {
    font-size: 900;
    background-color: #1d1f26;
  }

  .table-page .table table thead td,
  .table-page .table table tbody td {
    border: 1px solid var(--text-dimmed);
    font-size: 14px;
    color: var(--text-dimmed);
  }

  .table-page .table table tbody td:first-child {
    color: var(--text-dimmed);
    font-weight: normal;
  }

  .table-page .table table tbody .btn button {
    color: var(--text-dimmed);
  }
}

/*========= ANIMATION =========*/
@keyframes slideDown {
  0% {
    transform: translateY(0);
    opacity: 0;
  }

  50% {
    transform: translateY(5px);
    opacity: 0.5;
  }

  100% {
    transform: translateY(10px);
    opacity: 1;
  }
}
