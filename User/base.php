<?php header("Content-type: text/css"); ?>
:root{
    --white-color: #fff;
    --black-color: #000;
    --text-color: #333;
    --main-background-color: rgba(0, 0, 0, 0.05);
}

*{
    box-sizing: inherit;
}

html{
    /* 16px */
    font-size: 62.5%;
    line-height: 1.6rem;
    font-family: 'Roboto', sans-serif;
    box-sizing: border-box;
}

/* button style */
.btn{
    min-width: 124px;
    height: 34px;
    text-decoration: none;
    border: none;
    border-radius: 2px;
    font-size: 1.5rem;
    padding: 0 12px;
    outline: none;
    cursor: pointer;
    color: white;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    line-height: 1.6rem;
    background-color: white;
}
/* Responsive */
.grid{
    /* những màn hình có kích thước lớn hơn 1200px thì hiển thị web chỉ bằng 1200px */
    width: 1200px;
    /* những màn hình có kích thước nhỏ hơn 1200px thì nó fix lại nhỏ hơn 1200px*/
    max-width: 100%;
    margin: 0 auto;
}

.grid_full-width{
    width: 100%;
}

.grid__row{
    display: flex;
    flex-wrap: wrap;
    margin-left: -5px;
    margin-right: -5px;
}

.admin-grid__row {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    margin-left: -5px;
    margin-right: -5px;
}

.order-grid__row {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-left: -5px;
    margin-right: -5px;
}

.grid__column-2{
    padding-left: 5px;
    padding-right: 5px;
    width: 16.6667%;
    border-right: 1px solid rgba(0, 0, 0, 0.05);
}

.grid__column-10{
    padding-left: 5px;
    padding-right: 5px;
    width: 83.3333%;
    background-color: white;
}

.grid__column-2-4 {
    margin-left: 5px;
    margin-right: 5px;
    width: 19%;
}

.grid__column-5 {
    padding-left: 5px;
    padding-right: 5px;
    width: 41.666%;
}

.grid__column-7 {
    padding-left: 7px;
    padding-right: 10px;
    width: 58.334%;
}

.grid__column-12 {
    padding-left: 5px;
    padding-right: 5px;
    width: 100%;
    background-color: white;
}

.admin-grid__column-7 {
    padding-left: 5px;
    padding-right: 5px;
    width: 58.3334%;
}

.admin-grid__column-3 {
    padding-left: 5px;
    padding-right: 5px;
    width: 40.9999%;
}

.cart-grid__column-8 {
    padding-left: 5px;
    padding-right: 5px;
    width: 760px;
}

.cart-grid__column-4 {
    padding-left: 5px;
    padding-right: 5px;
    width: 380px;
}
/* Button style */
.btn {
    min-width: 124px;
    height: 34px;
    text-decoration: none;
    border: none;
    border-radius: 2px;
    font-size: 1.5rem;
    padding: 0 12px;
    outline: none;
    cursor: pointer;
    color: var(--white-color);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    line-height: 1.6rem;
}

/* Selection */
.select-input {
    position: relative;
    min-width: 150px;
    height: 34px;
    padding: 0 12px;
    border-radius: 2px;
    background-color: var(--white-color);
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 1;
}

.select-input:hover .select-input__list {
    display: block;
}

.select-input__label {
    font-size: 1.4rem;
}

.select-input__icon {
    font-size: 1.4rem;
    color: rgb(131, 131, 131);
    position: relative;
    top: 1px;
}

.select-input__list {
    position: absolute;
    left: 0;
    right: 0;
    top: 25px;
    border-radius: 2px;
    background-color: var(--white-color);
    padding: 8px 16px;
    list-style: none;
    display: none;
}

.select-input__link {
    font-size: 1.2rem;
    color: var(--black-color);
    text-decoration: none;
    display: block;
    padding: 4px 0;
}

.select-input__link:hover {
    color: red;
}

.copyright-information {
    background-color: var(--white-color);
    padding: 8px 0;
}

.footer-text {
    margin: 0;
    text-align: center;
    font-size: 1.2rem;
}

