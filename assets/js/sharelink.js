const whastapp = document.querySelector('.whastapp');
const telegram = document.querySelector('.telegram');
const twitter = document.querySelector('.twitter');
const facebook = document.querySelector('.facebook');
const pinterest = document.querySelector('.pinterest');
const linkedin = document.querySelector('.linkedin');

const pageUrl = location.href
const message = 'This is an awesome article, take 5 minutes to read it'

const whastappApi = `https://wa.me/?text=${pageUrl}. ${message}`;
const telegramApi = `https://t.me/share/url?url=${pageUrl}&text=${message}`
const twitterApi = `https://twitter.com/intent/tweet?text=${pageUrl}.${message}`
const facebookApi = `http://www.facebook.com/sharer.php?u=${pageUrl}.${message}`
const pinterestApi = `http://pinterest.com/pin/create/button/?url=${pageUrl}.${message}`
const linkedinApi = `https://www.linkedin.com/shareArticle?mini=true&url=${pageUrl}.${message}`
whastapp.addEventListener('click', ()=> {
    window.open(url = whastappApi, target='blank')
})

telegram.addEventListener('click', ()=> {
    window.open(url = telegramApi, target='blank')
})

twitter.addEventListener('click', ()=> {
    window.open(url = twitterApi, target='blank')
})

facebook.addEventListener('click', ()=> {
    window.open(url = facebookApi, target='blank')
})

pinterest.addEventListener('click', ()=> {
    window.open(url = pinterestApi, target='blank')
})

linkedin.addEventListener('click', ()=> {
    window.open(url = linkedinApi, target='blank')
})