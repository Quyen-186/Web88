<?php header("Content-type: text/css"); ?>

.app{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background-color: rgba(0, 0, 0, 0.05);
}
.header{
   height: 142px;
   background-image: linear-gradient(0, #ff4444, #ff4444);
}

.header__navbar{
    display: flex;
    justify-content: space-between;
}

.header__navbar-list{
    list-style: none;
    display: flex;
}

.header__navbar-item{
    margin: 0 8px;
    position: relative;
}

.header__navbar-item, 
.header__navbar-item-link
{
    display: inline-block;
    font-size: 1.5rem;
    color: var(--white-color);
    text-decoration: none;
    /* bỏ dấu ngoặc của thẻ a */
}

.header__navbar-icon-link {
    color: var(--white-color);
}
.header__navbar-item header__navbar-item--strong{
     font-weight: 400;
}

/* Header with search */
.header-with-search{
    height: 99.27px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.header__logo{
    width: 200px;
    border-radius:10px;
}

.header__logo-img{
    width: 170px;
    margin-top: 5px;
}

.header__search{
    background-color: var(--white-color);
    flex: 1;
    width: 585px;
    height: 34px;
    border-radius: 2px;
    display: flex;
    align-items: center;
    position: relative;
}

.header__search-input{
    flex: 1;
    height: 100%;
    border: none;
    outline: none;
    font-size: 1.4rem;
    color: var(--text-color);
    padding: 0 16px;
    border-style: solid;
    border-width: thin;
}

/* .header__search-btn {
    border: none;
    height: 34px;
    padding-top: 0;
    padding-bottom: 0;
    border-radius: 3px;
    margin-right: 3px;
    outline: none;
    cursor: pointer;
} */

.header__search-btn {
    position: absolute;
    right: 10px
}

.header__search-btn-icon {
    font-size: 1.4rem;
    color: var(--black-color);
}

.header__cart{
    width: 150px;
    height: 99.27px;
    text-align: center;
}

.header__cart-icon{
    font-size: 2.4rem;
    color: var(--white-color);
    margin-top: 40px;
}

/* App container */
.app__container{
    height: 100%;
}

.app__content{
    margin-top: 24px;
    background-color: white;
}
.category{
    border-radius: 2px;
    background-color: var(--white-color);
}

.category__heading{
    font-size: 1.7rem;
    color: var(--text-color);
    padding: 12px 16px;
    margin-top: 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.category__heading-icon{
    font-size: 1.6rem;
}

.category-list{
    padding: 0 0 8px 0;
    list-style: none;
}

.category-item__active .category-item__link {
    color: red;
}

.category-item__link {
    position: relative;
    font-size: 1.5rem;
    color: var(--text-color);
    text-decoration: none;
    padding: 4px 16px;
    display: block;
    transition: right linear 0.1s;
    right: 0;
}

.category-item__link:hover {
    right: -4px;
    color:red
}

/* Home sort +filter */
.home-filter{
    background-color: #00b4e8;
    display: flex;
    align-items: center;
    padding: 8px 22px;
    border-radius: 2px;
}

.home-filter__label{
    font-size: 1.4rem;
    color: white;
    margin-left: 16px;
    margin-right: 12px;
}

.home-filter__btn{
    min-width: 90px;
    margin-right: 12px;
    --white-color: #000
}

.home-filter__button{
    color: black;
}

.home-filter__btn:hover{
    color: red;
}

.home-filter__page {
    display: flex;
    align-items: center;
    margin-left: auto;
}

.home-filter__page-num {
    font-size: 1.5rem;
    color: var(--text-color);
    margin-right: 22px;
}

.home-filter__page-current {
    color: red;
}

.home-filter__page-control {
    border-radius: 2px;
    overflow: hidden;
    display: flex;
    width: 72px;
    height: 36px;
}

.home-filter__page-btn {
    flex: 1;
    display: flex;
    text-decoration: none;
    background-color: var(--white-color);
}

.home-filter__page-btn:first-child {
    border-right: 1px solid #eee;
}

.home-filter__page-icon {
    margin: auto;
    font-size: 1.4rem;
    color: 555;
}

.home-filter__page-btn--disabled {
    cursor: default;
    background-color: #f9f9f9;
}

.home-filter__page-btn--disabled .home-filter__page-icon {
    color: #ccc;

}
/* Home + shop filter */

.home-product{
    margin-bottom: 10px;
    height: auto;
    display: flex;
    flex-wrap: wrap;
}

.home-product1{
    margin-bottom: 10px;
    height: auto;
}

.home-product-item{
    <!-- display:block;
    position: relative; -->
    margin-top: 10px;
    text-decoration: none;
    background-color: var(--white-color);
    border-bottom-left-radius: 2px;
    border-bottom-right-radius: 2px;
    box-shadow: 0 0.1px 2px 0 rgba(0, 0, 0, 0.1);
    transition: transform linear 0.1s;
    will-change: transform;
    padding: 20px;
    align-items: center;
}

.home-product-item:hover{
    transform: translateY(-1px);
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}
.home-product-item__img{
    flex-wrap: wrap;
    float: left;
    width: 195px;
    height: 195px;


}
.home-product-item__img1{
    flex-wrap: wrap;
    float: left;
    width: 195px;
    height: 195px;

}


.home-product-item__name{
    font-size: 1.4rem;
    font-weight: 400;
    color: var(--text-color);
    line-height: 1.8rem;
    margin: 10px 0;
}

.home-product-item__price-current{
    font-size: 1.6rem;
    color: red;
}

/* footer */
.footer {
    width: 100%;
    background-color: #ff4444;
    margin-top: 0px;
    padding-top: 16px;
}

.footer__heading {
    font-size: 1.4rem;
    text-transform: uppercase;
    color: var(--white-color);
}

.footer-list {
    padding-left: 0%;
    list-style: none;
}

.footer-item__link {
    text-decoration: none;
    font-size: 1.4rem;
    color: var(--white-color);
    padding: 10px 0;
    display: block;
}

.footer-item__link:hover {
    color: var(--text-color);
}

.footer-img {
    width: 110px;
}