 function deleteConfirm(theURL, id) {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this record!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function() {
        swal("Deleted!", "Item id "+ id +" has been deleted.", "success");
        window.location = theURL;
    });
}
 $(document).ready(function() {
    // Initializes search overlay plugin.
    // Replace onSearchSubmit() and onKeyEnter() with
    // your logic to perform a search and display results
    $('[data-pages="search"]').search({
        searchField: '#overlay-search',
        closeButton: '.overlay-close',
        suggestions: '#overlay-suggestions',
        brand: '.brand',
        onSearchSubmit: function(searchString) {
            console.log("Search for: " + searchString);
        },
        onKeyEnter: function(searchString) {
            console.log("Live search for: " + searchString);
            var searchField = $('#overlay-search');
            var searchResults = $('.search-results');
            clearTimeout($.data(this, 'timer'));
            searchResults.fadeOut("fast");
            var wait = setTimeout(function() {
                searchResults.find('.result-name').each(function() {
                    if (searchField.val().length != 0) {
                        $(this).html(searchField.val());
                        searchResults.fadeIn("fast");
                    }
                });
            }, 500);
            $(this).data('timer', wait);
        }
    });

    // seleted sidebar
    var activemenu = $('.container-fluid').attr('rel');
    var activemenuselector = $('#' + activemenu);
    if (activemenuselector.length) {
        activemenuselector.addClass('active');
        activemenuselector.parent().parent().addClass('active');
    }
    // Check all checkboxes when the one in a table head is checked:
    $('#basicTable .check-all').click( function(){
        $(this).parent().parent().parent().parent().parent().find("input[type='checkbox']").prop('checked', $(this).is(':checked'));
        // $(this).parent().parent().parent().parent().parent().find("tr").removeClass('selected');
        // $(this).parent().parent().parent().parent().parent().find("tr").addClass('selected');
    });

    // jQuery search able to filter category
    $( '#category-search-container' ).searchable({
        searchField: '#category-search-field',
        selector: '.category-search-row',
        childSelector: '.category-search-child',
        searchType: 'fuzzy'
    })

    // Select id, name from category list and put to wizard table mapping.
    var $categories = $('.category-search-row');
    var $chooseCategory = $('.choose-category');
    var $quickview = $('.quickview-wrapper');
    $categories.on('click', function(event) {
        var self = this;
        var name = $(self).find('.text-master.name').html();
        var id = $(self).find('.categoryId').val();
        var haravan_id = $('.quickview-header-value').val();

        // Append to table wizard and hide the category list view.
        $('.category-id-'+ haravan_id +'-name').text(name);
        $('.input-category-id-'+ haravan_id +'-value').attr('value', id);
        $('.input-category-id-'+ haravan_id +'-name').attr('value', name);

        // Hide the category list
        $quickview.removeClass('open');
    });

    // Click to show category list and add a flag to remember current category which active this.
    $chooseCategory.on('click', function(event) {
        // if category list view is open, force exit all event.
        if ($quickview.hasClass('open')) {
            event.stopPropagation();
        } else {
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            $('.quickview-header-name').html('Mapping: ' + name);
            $('.quickview-header-value').val(id);
        }
    });
})
