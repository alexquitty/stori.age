/**
 * Created by a.chernov on 26.10.2017.
 */
$(document).on('click', '.entity-index button.btn-link', function()
{
	var obj = $('.entity-search form').find('input, select').filter('[name="EntitySearch['+$(this).data('field')+']"]');
	var text = isset($(this).data('value')) ? $(this).data('value') : $(this).text();
	obj.val(text == obj.val() ? '' : text).submit();
});

$(document).on('change', '.entity-search select', function()
{
	$(this).submit();
});