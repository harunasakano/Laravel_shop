$(function(){
  $('#query_word').on('blur', function() {
    {
      let error;
      let value = $(this).val();

      if(value == "")
        {
          error = true;
        }
      else if(!value.match(/[^\s\t]/))
        {
          error = true;
        }

      if(error)
      {
        if(!$(this).nextAll('span.error-info').length)
        {
          $(this).after('<span class = "error-info">※検索キーワードは必須です</span>');
        }
      }
      else
      {
        if($(this).nextAll('span.error-info').length)
        {
          $(this).nextAll('span.error-info').remove();
        }
      }
    };
});
  //エラーあったらサブミットしない
  $('#queryform').submit(function(){

     //既にエラー文が表示されてる場合
     let error = $(this).find('span.error-info').length;
     if($('#query_word').val() === '' || (error)) {
      alert('未入力の項目があります！');
      return false;
     }
});
});
