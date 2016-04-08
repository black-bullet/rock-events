$(function () {
    $('input:radio[name=music-category]').change(function () {
        $valInput = $('input:radio[name=music-category]:checked').val();
        switch ($valInput) {
            case 'all':
                $('.country').hide();
                $('.genre').hide();
                break;
            case 'country':
                $('.country').show();
                $('.genre').hide();
                break;
            case 'genre':
                $('.country').hide();
                $('.genre').show();
                break;
        }
    });
});

