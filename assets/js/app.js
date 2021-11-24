LC.Page.Post = {
    List : {
        url : LC.Page.url(LC.vars.baseDir + '/post/list'), /* mapping directory */
        /* Initialize the post listing page */
        init : function(lang) {
            LC.List.init({
                url: LC.Page.Post.List.url,
                params: {
                    lang: lang
                }
            });
        },
    }
};

LC.Page.Category = {
    url : LC.Page.url(LC.vars.baseDir + '/category'), /* mapping directory */
    /* Initialize the Category page */
    init : function() {
        LC.List.init({
            url: LC.Page.Category.url,
            formModal: '#dialog-category',
            formId: 'form-category',
            editCallback: LC.Page.Category.edit,
        });
    },
    list: function() {
        LC.List.list();
    },
    /* Callback to set values when the dialog is open to edit an existing entry */
    edit : function($form, $data) {
        $form.find('input[name="name"]').val($data.name);
        // load data for the other translation text boxes
        if (typeof $data.name_i18n !== 'undefined') {
            for (var c in $data.name_i18n) {
                if ($data.name_i18n.hasOwnProperty(c)) {
                    $form.find('input[name="name_' + c + '"]').val($data.name_i18n[c]);
                }
            }
        }
    }
};

LC.Page.User = {
    List : {
        url : LC.Page.url(LC.vars.baseDir + '/user/list'), /* mapping directory */
        /* Initialize the page */
        init : function() {
            LC.List.init({
                url: LC.Page.User.List.url,
            });

            LC.Page.afterRequest = function () {
                $('.list .actions .delete').on('click', function (e) {
                    e.preventDefault();

                    if ($(this).hasClass('disabled')) {
                        $('#dialog-warning').dialog('open');
                    } else {
                        LC.List.remove($(this).attr('rel'));
                    }
                });
            };

            $('#dialog-warning').dialog({
                modal: true,
                autoOpen: false,
                resizable: false,
                width: 350,
                minHeight: 90,
                buttons: {
                    OK: function() {
                        $(this).dialog('close');
                    }
                }
            });
        },
    }
};
