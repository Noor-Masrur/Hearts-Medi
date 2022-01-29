jQuery(document).ready(function() {
jQuery('.tabs .tab-links a').on('click', function(e)  {
var currentAttrValue = jQuery(this).attr('href');

// Show/Hide Tabs
jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

// Change/remove current tab to active
jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

e.preventDefault();
});


jQuery('.nextButton').on('click', function() {

var $activeTab = $('.tab-links li.active');

var $wrapper = jQuery(this).closest('.tabs');
var indexActive = $wrapper.find('li.active').index();
$wrapper.find('li').eq(indexActive + 1).find('a').click();
});

jQuery('.prevButton').on('click', function() {

var $activeTab = $('.tab-links li.active');

var $wrapper = jQuery(this).closest('.tabs');
var indexActive = $wrapper.find('li.active').index();
$wrapper.find('li').eq(indexActive - 1).find('a').click();
});

});