// import './clock';
// import './carousel';
import './menu';
import './woo';
import './posts/loadmore';

// Styles
import '../sass/main.scss';

// Images
import '../img/patterns/bg.jpeg';
import '../img/patterns/c1-150x150.jpeg';
import '../img/patterns/c2-150x150.jpeg';
import '../img/patterns/c3-150x150.jpeg';
import '../img/email.webp';
import '../img/payment.webp';
import '../img/secure-with-macfee.webp';

jQuery(document).ready(function($){
    $('.rank-math-question').click(function(){
        $(this).toggleClass('plus-minus-icon');
        $(this).toggleClass('active').next('.rank-math-answer').slideToggle('fast');
        if ($(this).hasClass('active')) {
          $(this).find('.plus-minus-icon').text('-');
        } else {
          $(this).find('.plus-minus-icon').text('+');
        }
    });
});