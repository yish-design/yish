<section class="contact" id="contact">
    <h1 class="title">联系我们</h1>
    <h1 class="title-en">CONTACT</h1>
    <hr />
    <div class="content">
        <div class="form">
            <form action="/index.php?c=form_1_1" method="post" name="myform" id="myform">
                <div class="column">
                    <input required="required"  name="data[title]" id="name" value="" placeholder=" 姓名" type="text" />
                </div>
                <div class="column">
                    <input required="required"  name="data[mail]" id="email" value="" placeholder="邮箱地址" type="email"/>
                </div>
                <div class="column">
                    <textarea id="message" required="required"  name="data[content]"></textarea>
                </div>
                <div class="button">
                    <span><input class="submit" id="submit" name="submit" type="submit" value="发送" /></span>
                </div>
            </form>
        </div>

    </div>
</section>