var attachClicked = function ($name, $path) {
    var $li = $('<li></li>');
    $li.append($('<input type="hidden" value="' + $name + '|' + $path + '" name="attachments[]" />'))
    var $remover = $('<a href="#" class="remove-attachment"><i class="fa fa-trash"></i></a>');
    $remover.click(function () {
        removeAttachment($(this));
    });
    $li.append($remover);
    $li.append('&nbsp;');
    $li.append($('<a href="' + $path + '" target="_blank">' + $name + '</a>'));
    $('.attachments ul').eq(0).append($li);
};

var removeAttachment = function ($a) {
    if (confirm('Remove attachment?')) {
        $a.parents('li').empty().remove();
    }
};

$(function () {
    $('.remove-attachment').click(function () {
        removeAttachment($(this));
    });
});