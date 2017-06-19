/**
 * Created by uniceub on 23/05/17.
 */
$('.message a').click(function()
{
    $('form').animate({height: 'toggle', opacity: 'toggle'}, 'slow');
});