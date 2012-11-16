<?echo js_asset('document','doc.util.js')?>
<?echo js_asset('document','doc.remocon.js')?>
<?echo js_asset('document','doc.paper.js')?>
<?echo js_asset('document','doc.listpanel.js')?>
<?echo js_asset('document','doc.element.html.js')?>
<?echo js_asset('document','doc.element.twitter.js')?>
<?echo js_asset('document','doc.element.textarea.js')?>
<?echo js_asset('document','doc.element.youtube.js')?>
<?echo js_asset('document','doc.element.image.js')?>
<?echo js_asset('document','doc.element.file.js')?>
<?echo js_asset('document','doc.element.naver_blog.js')?>



<div>
    <div id="image_explorer"> 

    </div>
</div>

<script> 
$(function(){ 
    $('#document_form').submit(function(){
        var html = DOC.paper.html() ; 
        $('#document_form').find('[name=content]').val(html) ; 
    }) ; 
    DOC.remocon_panel.init({
        id : 'remocon' ,
        cls : 'well' ,
        items : [
            {
                btn_tmpl : '<button class="btn"><i class="icon icon-book"></i> 문단</button>', 
                Element : DOC.Element.Textarea 
            },{
                btn_tmpl : '<button class="btn"><i class="icon icon-book"></i> HTML</button>', 
                Element : DOC.Element.HTML 
            },{
                btn_tmpl : '<button class="btn"><i class="icon icon-book"></i> Image</button>', 
                Element : DOC.Element.Image 
            },{
                btn_tmpl : '<button class="btn"><i class="icon icon-book"></i> Twitter</button>', 
                Element : DOC.Element.Twitter 
            },{
                btn_tmpl : '<button class="btn"><i class="icon icon-book"></i> File</button>', 
                Element : DOC.Element.File
            },{
                btn_tmpl : '<button class="btn"><i class="icon icon-book"></i> 네이버 블로그</button>', 
                Element : DOC.Element.Naver_blog
            },{
                btn_tmpl : '<button class="btn"><i class="icon icon-book"></i> 유튜브 </button>', 
                Element : DOC.Element.Youtube
            },{
                btn_tmpl : '<button class="btn"><i class="icon icon-book"></i>페이스북</button>', 
                Element : DOC.Element.File
            }
        ]
    }); 


    DOC.remocon_panel.render() ; 

    DOC.paper.init('document_body') ; 
    DOC.paper.sortable();
}); 
</script>
