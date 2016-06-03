/**
 * Delete card functions.
 */
$(function() {
    var card_delete = function(id) {
        $('form[data-id="' + id + '"]').submit();
    };

    $('a[data-action="destroy"]').on('click', function(e) {
        e.preventDefault();

        card_delete($(this).data('id'));
    });

    $('form[data-action="destroy"]').on('submit', function(e) {
        return confirm('Deseja excluir o cartão?');
    });
});