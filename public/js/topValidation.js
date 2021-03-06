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

//購入確認画面で必須項目にチェック無しの場合の処理
$(function(){
  $('#completeform').submit(function(){
    if($("#agree_check").prop("checked")==false){
        alert('注文確認がチェックされていません！');
        $(".agreetext").after('<span class = "error-info">※この項目は必須です</span>');
      return false;
    }
  });
});
