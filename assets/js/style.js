let profile = document.querySelector('.header .flex .profile');
let navbar = document.querySelector('header .flex .navbar');
document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
};
document.querySelector('#profile-close').onclick = () =>{
  profile.classList.remove('active');
}
document.querySelector('#user-btn').onclick = () =>{
  profile.classList.toggle('active');
  navbar.classList.remove('active');
}

let searchForm = document.querySelector('.search-form');
document.querySelector('#search-btn').onclick = () =>{
  // window.location.replace("index.php?#product");
  searchForm.classList.toggle('active');
  navbar.classList.remove('active');
  // window.location.href= "#product"
}
// scroll spy 
let section = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('.header .flex .navbar a');

window.onclick = (x) => {
  //console.log(x);
  var srcbtn = x["path"]["0"]["id"];

  if(srcbtn != "search-btn" && srcbtn != "keyword" )
  {
    //console.log(srcbtn)
    searchForm.classList.remove('active');

  }
}

window.onscroll = () =>{
    navbar.classList.remove('active');
    profile.classList.remove('active');

  if(window.scrollY > 0){
    document.querySelector('.header').classList.add('active');
  }else{
    document.querySelector('.header').classList.remove('active');
  }

};

window.onload = () =>{
  if(window.scrollY > 0){
    document.querySelector('.header').classList.add('active');
  }else{
    document.querySelector('.header').classList.remove('active');
  }
};


