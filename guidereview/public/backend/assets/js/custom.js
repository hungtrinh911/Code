jQuery.fn.richer = function (selector, settings) {
    var options = jQuery.extend({}, settings);

    tinymce.init({
        language: 'vi_VN',
        selector: selector,
        theme: "modern",
        height: 300,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager "
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | responsivefilemanager code",
        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],
        image_advtab: true,
        relative_urls: false,

        external_plugins: {"filemanager": "/backend/plugins/filemanager/plugin.min.js"},
        external_filemanager_path: "/backend/plugins/filemanager/",
        filemanager_title: "Quản trị file",
        // filemanager_access_key: "A2A294ACF8970E2FEEA06F9F83E84BB5"
    });
};

jQuery.fn.zenTree = function (settings) {
    var options = jQuery.extend({
        data: [],
        target: []
    }, settings);

    var data = options['data'];
    if ($(options['target']).val().length > 0) {
        console.log($(options['target']).val());
        var nodes = JSON.parse($(options['target']).val());
        $.each(data, function (i, item) {
            $.each(nodes, function (j, node) {
                if (item.id == node.id) {
                    data[i]['state'] = JSON.parse('{"selected": true}');
                }
            });
        });
    }

    $(this).jstree({
        'core': {
            'themes': {
                'responsive': false
            },
            'data': data
        },
        'types': {
            'default': {
                'icon': 'fa fa-folder'
            },
            'file': {
                'icon': 'fa fa-file'
            }
        },
        'plugins': ['types', 'checkbox'],
        'checkbox': {
            'three_state': false
        }
    }).on('ready.jstree', function () {
        $(this).jstree('open_all');
    }).on('changed.jstree', function (e, data) {
        var nodes = $(this).jstree('get_selected', true);
        var arr = [];
        $.each(nodes, function (i, val) {
            arr.push(val)
        });
        $(options['target']).val(JSON.stringify(arr));
    });
};

jQuery.fn.slugify = function (settings) {
    var options = jQuery.extend({
        event: 'keyup change',
        target: ''
    }, settings);

    $(this).on(options['event'], function () {
        $(options['target']).val(slugify($(this).val()));
    });
};

var slugify = function (str) {
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "a");
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "e");
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "i");
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "o");
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "u");
    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "y");
    str = str.replace(/Đ/g, "d");

    str = str.replace(/[^0-9a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ\s]/gi, '');
    str = str.replace(/\s+/g, ' ');
    str = str.trim();

    str = str.toString().toLowerCase()
        .replace(/\s+/g, '-')           // Replace spaces with -
        .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
        .replace(/\-\-+/g, '-')         // Replace multiple - with single -
        .replace(/^-+/, '')             // Trim - from start of text
        .replace(/-+$/, '');            // Trim - from end of text

    return str;
};

var reloadImages = function (field_id, upload_folder) {
    var html = '<div class="img-item">' +
        '<img src="{img}" alt="image" height="90" />' +
        '<a href="javascript:;" class="btn-remove btn-deselect-img" data-src="{img}"><i class="ti-close"></i></a>' +
        '</div>';

    var selector = '#' + field_id;
    var files;

    try {
        files = JSON.parse($(selector).val());
    } catch (e) {
        files = $(selector).val();
    }

    if ($.isArray(files)) {
        var newArr = [];
        var imgs = '';
        $.each(files, function (i, val) {
            var tmp = upload_folder + val;
            newArr.push(tmp);
            imgs += html.replace(/{img}/g, tmp);
        });
        $(selector).val(JSON.stringify(newArr));
        $(selector).next('div').remove();
        $(selector).after(imgs);
        $('.btn-deselect-img').on('click', function () {
            newArr = JSON.parse($(selector).val());
            var removeItem = $(this).prev().attr('src');
            newArr = $.grep(newArr, function (value) {
                return value !== removeItem;
            });
            $(selector).val(JSON.stringify(newArr));
            $(this).parent().remove();
        });
    } else {
        var tmp = upload_folder + files;
        $(selector).val(tmp);
        $(selector).next('div').remove();
        $(selector).after(html.replace(/{img}/g, tmp));
        $('.btn-deselect-img').on('click', function () {
            $(selector).val('');
            $(this).parent().remove();
        });
    }
};

/**
 * Hack for table loading issue - ideally this should be fixed in plugin code itself.
 */
$(window).on('load', function () {
    $('[data-toggle="table"]').show();
});