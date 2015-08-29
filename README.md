# collegeTask
you code because you love it
<br>
0.我最重要一定要先读我<br>
（-1）http://115.28.65.99/collegeAPI/user/login_user.php 这是登录的Action例子<br>
（0）数据库访问地址：115.28.65.99/phpmyadmin   数据库是collegeAPI<br>
（1）下面的第一条和第二条可能已经作废，放在这是为了参考作用。<br>
（2）返回数据类型是JSON格式。<br>
（3）多数接口输入参数个数是动态的，默认后台sql拼装是and<br>
（4）请一定先看下之前在群里共享的数据库表说明，可能后期有更改，实际以线上为准<br>
（5）每个API具体操作哪一张表，请查看代码中sql部分，后期我会写上，如果没有，请以代码为准<br>
（6）POST方法携带的参数请一定与数据库中的表字段保持一致<br>
（7）到目前为止，基本的接口算是提供了。客户端同学可以灵活调用这些基本接口去实现业务逻辑，基本也就是增改查，不做删除操作。<br>
（8）举个例子，第一步，调用queryAllJobs实现所有任务的展示，可以刚开始展示部分信息，比如标题什么的，后面点击进去的话可以利用刚刚取得的数据进行填充。这样也省数据库查询操作。不过后期一定是会增加分页查找的，到时候会有稍微改动，不过会以最低影响客户端的方式去实现。<br>
（9）个人认为，基本的都已经实现了，如果大家有什么疑问可以找我，然后我会修改或者添加新的接口。<br>



@Depricated（废弃）<br>
1.登录url为http://115.28.65.99/collegeTask/login.php

  传入方法  POST <br>
  传入参数名 username  password<br>
  返回结果类型： JSON<br>
  首先会进行判空处理，如果用户名或者密码只要有一个为空  {"code":0,"msg":"用户名或者密码不能为空"}<br>
  用户名正确密码错误：{"code":0,"msg":"密码错误"}<br>
  用户名不存在： {"code":0,"msg":"用户名不存在"}<br>
  密码错误示例： {"code":0,"msg":"密码错误"}<br>
  返回结果成功示例：{"code":1,"username":"zp"}<br>


2.ajax（重要）<br>
  测试：访问  http://115.28.65.99/collegeTask/ajaxTest/test.html <br>
  输入用户名：zp 密码：zp 返回json  {"message":"true","code":"0"}  输入错误返回  {"message":"false","code":"1"} <br>
  详细请参考test.html代码<br>
  需要注意的如下：<br>
  1.var data = {}; 需要先声明一个空的字典<br>
  2.data = $(this).serialize() + "&" + $.param(data);拼装参数,例子：username=zp&password=zp&最后面多了个&，可以忽略<br>
  3.data["json"]的作用仅仅只是为了方便调试，打印出来完整的json格式，具体使用的时候直接使用data["message"]即可，其实就是个map（key-value）,当然也可以使用console.log(data),看个人习惯了。<br>
  4.have fun!


3.user/下面的接口<br>
register_user.php<br>
主要是学生注册（非商家注册）<br>
用法：很灵活，不限定字段数量，只是通过POST方法传入的字段必须要与数据库字段保持一致。<br>
返回值：{"code":1,"info":"register_user success!"}<br>
{"code":0,"info":"register_user fail!"}   如果不一致会报错<br>
<br>
register_shop.php<br>
主要是商家注册<br>
用法：很灵活，不限定字段数量，只是通过POST方法传入的字段必须要与数据库字段保持一致。<br>
返回值：{"code":1,"info":"register_shop success!"}<br>
{"code":0,"info":"register_shop fail!"}   如果不一致会报错<br>
<br>

login_user.php<br>
学生用户登录<br>
  传入方法  POST <br>
  传入参数名 username  password<br>
  返回结果类型： JSON<br>
  首先会进行判空处理，如果用户名或者密码只要有一个为空  {"code":0,"msg":"用户名或者密码不能为空"}<br>
  用户名正确密码错误：{"code":0,"msg":"密码错误"}<br>
  用户名不存在： {"code":0,"msg":"用户名不存在"}<br>
  密码错误示例： {"code":0,"msg":"密码错误"}<br>
  返回结果成功示例：{"code":1,"username":"zp"}<br>
  <br>

login_shop.php<br>
商家用户登录<br>
  传入方法  POST <br>
  传入参数名 username  password<br>
  返回结果类型： JSON<br>
  首先会进行判空处理，如果用户名或者密码只要有一个为空  {"code":0,"msg":"用户名或者密码不能为空"}<br>
  用户名正确密码错误：{"code":0,"msg":"密码错误"}<br>
  用户名不存在： {"code":0,"msg":"用户名不存在"}<br>
  密码错误示例： {"code":0,"msg":"密码错误"}<br>
  返回结果成功示例：{"code":1,"username":"zp"}<br>
  <br>



checkUserExist.php<br>
主要用来判断nickname是否存在（以保证唯一性，nickname是唯一的，也是登陆的用户名）<br>
用法：需要通过POST方法传入名位nickname的用户名<br>
返回值<br>
如果用户名存在：{"code":0,"msg":"nickname already exist!"}<br>
如果用户名不存在：{"code":1,"msg":"nickname does not exist!"}<br>
<br>
queryUserBase.php<br>
可以根据数据库表字段名称去查询用户信息（用户的密码已经过滤掉，不会返回）<br>
用法：这个接口设计的很灵活。可以通过POST方法传入名字为nickname的值。也可传入多个参数，服务端代码中拼装sql是通过and来组装多个参数，所以使用时候请注意。<br>
返回值：比如我通过<input type="text" name="nickname" /> 输入value 为zp，那么返回JSON格式是个数组(这样的设计等到后面根据分类取多个信息就很容易明白了)。<br>
[{"id":"1","nickname":"zp","realname":"zp","qq":"","phone":"","address":"","user_status":"0","registertime":"2015-07-10 16:26:54","sex":"","school":"","major":"b","skills":"b","punish_status":"0"}]<br>
如果数据库里面没有数据，那么返回[]，是个空的JSON数组。客户端同学可以根据这个来判断数据库中到底有没有数据。一般来讲判空是第一步，这样是为了增加代码的健壮性，否则带来的问题是客户端崩溃。<br>
<br>
updateUserInfo.php<br>
根据nickname（唯一性）去更新用户信息。<br>
用法：通过POST方法传入nickname（必须！）以及要更改的字段（严格按照数据库表的字段，一模一样哟）<br>
返回值：{"code":1,"info":"update success and nickname is zzy"}<br>
{"code":0,"info":"update failed nickname not exist"}<br>
<br>

queryShopDetailBase.php<br>
可以根据数据库表字段名称去查询商户信息（用户的密码已经过滤掉，不会返回）<br>
可以通过POST方法传入名字为nickname的值。也可传入多个参数，服务端代码中拼装sql是通过and来组装多个参数，所以使用时候请注意。<br>
返回值：比如我通过<input type="text" name="nickname" /> 输入value 为zp，那么返回JSON格式是个数组(这样的设计等到后面根据分类取多个信息就很容易明白了)。<br>
[{"id":"1","nickname":"zp","bossname":"zp","shopName":"zp","qq":"zp","phone":"","address":"","user_status":"0","registertime":"2015-07-12 15:32:11","sex":"","companyDesc":"","punish_status":"0","score":"1.5"}]<br>
如果数据库里面没有数据，那么返回[]，是个空的JSON数组。客户端同学可以根据这个来判断数据库中到底有没有数据。一般来讲判空是第一步，这样是为了增加代码的健壮性，否则带来的问题是客户端崩溃。<br>
<br>


updateShopDetail.php<br>
根据id（唯一性）去更新商户信息。<br>
用法：通过POST方法传入id（必须！）以及要更改的字段（严格按照数据库表的字段，一模一样哟）<br>
返回值：{"code":1,"info":"update success and id is 1"}<br>
{"code":0,"info":"update failed id not exist"}<br>
<br>

4.job/下面的接口<br>
publishJob.php<br>
发布任务接口。字段数量自己确定，需要注意的是名字要与数据库保持一致。<br>
用法：POST方法，携带字段信息<br>
返回值：{"code":1,"info":"publish success"}<br>
{"code":0,"info":"publish failed"}(如果字段与数据库不一致会出现这种错误)<br>


queryJobBase.php<br>
查询job.<br>
可以通过POST方法传入名字为category1的值。也可传入多个参数，服务端代码中拼装sql是通过and来组装多个参数，所以使用时候请注意。<br>
返回值：比如我通过<input type="text" name="category1" /> 输入value 为zp，那么返回JSON格式是个数组。<br>
[[{"id":"4","category1":"haha","category2":"","title":"hehe","content":null,"publish_time":"2015-05-03 01:56:31","updatetime":"2015-07-11 23:46:46","paymethod":"","effective_end_time":"2015-05-02 19:56:31","publish_nickname":"","take_username":"","country":"","province":"","city":"","area":"","end_status":"0","require_count":"0","enroll_count":"0","sign_count":"0","require_sex":"","require_degree":"","require_age":"","treatment_money":"","treatment_service":"","treatment_stuff":"","hot_status":"0","push_top_status":"0","working_period_date":"","workind_period_time":""}]<br>
如果数据库里面没有数据，那么返回[]，是个空的JSON数组。客户端同学可以根据这个来判断数据库中到底有没有数据。一般来讲判空是第一步，这样是为了增加代码的健壮性，否则带来的问题是客户端崩溃。<br>
<br>

queryAllJobs.php<br>
查询所有的job，未来会考虑分页。这里是返回所有的数据，后台的sql是select * from post where 1;后面数据量大了肯定会出问题，不过第一阶段先这样，使用场景，当显示所有任务的时候可以用这个。客户端在一起查询数据之后未来可以多次使用，这样也可以减少数据库查询次数，减少响应时间。<br>
使用方法：POST方法,不需要传递参数，返回类型是JSON数组.<br><br>

updateJob.php<br>
根据id更改job<br>
用法：POST携带要更改的参数（可以为多个，其中id是必须的,字段必须要与数据库保持一致）。<br>
返回值：{"code":1,"info":"update success and id is 4"}<br>
{"code":0,"info":"update failed id not exist"}<br>
<br>

5.enroll/下面的接口<br>
enroll.php<br>
主要是报名信息。学生可以报名指定任务id的任务<br>
使用方式：POST方法，传递参数（taskid,task_taker）   values（任务的id，报名任务的nickname）<br>
返回值：{"code":1,"info":"enroll success"}<br>
{"code":0,"info":"enroll fail"}<br>
<br>

queryEnrollBase.php<br>
查询报名信息，可以用来统计报名数量。<br>
使用方法：POST 方法  （taskid） values（任务id）<br>
返回值：[{"id":"1","taskid":"1","task_taker":"zp","time":"2015-07-12 19:48:53"},{"id":"2","taskid":"1","task_taker":"zpp","time":"2015-07-12 19:48:53"}]<br>
如果没有查询到，那么则返回空的JSON数组[],请先进行出错判断。<br>
<br>

6.judgeShop/下面的接口<br>
judgeShop.php<br>
添加学生用户评论商店<br>
用法:POST方法，携带可变数量的参数（名称与数据库字段保持一致）<br>
返回值：{"code":1,"info":"judge shop success"}<br>
{"code":0,"info":"judge shop fail"}<br>
<br>

queryJudgeShopBase.php<br>
查询学生对商店的评论<br>
用法:POST方法，携带可变数量的参数（名字与数据库保持一致）<br>
返回值：[{"id":"1","shopName":"shopNAME","nickname":"sduhuhd","content":"bad","star":"0","time":"2015-07-12 20:43:12"},{"id":"2","shopName":"shopNAME","nickname":"sdhsud","content":"good","star":"2","time":"2015-07-12 20:43:04"}]<br>
如果查询没有结果的话会返回空的JSON数组。所以请事先判断。<br>
<br>

updateJudgeShop.php<br>
更改评价，所有的update方法都是先根据id去查询，所以POST方法一定要带有id属性<br>
用法：POST方法，输入可变数量的参数（id必须，与数据库字段保持一致）<br>
返回值：{"code":1,"info":"update success and id is 1"}<br>
{"code":0,"info":"update failed id not exist"}<br>
<br>

7.judgeUser/下面的接口<br>
judgeUser.php<br>
添加商店评论学生<br>
用法:POST方法，携带可变数量的参数（名称与数据库字段保持一致）<br>
返回值：{"code":1,"info":"judge user success"}<br>
{"code":0,"info":"judge user fail"}<br>
<br>

queryJudgeUserBase.php<br>
查询商店对学生的评论<br>
用法:POST方法，携带可变数量的参数（名字与数据库保持一致）<br>
返回值：[{"id":"1","shopName":"shopNAME","nickname":"sduhuhd","content":"bad","star":"0","time":"2015-07-12 20:43:12"},{"id":"2","shopName":"shopNAME","nickname":"sdhsud","content":"good","star":"2","time":"2015-07-12 20:43:04"}]<br>
如果查询没有结果的话会返回空的JSON数组。所以请事先判断。<br>
<br>

updateJudgeUser.php<br>
更改评价，所有的update方法都是先根据id去查询，所以POST方法一定要带有id属性<br>
用法：POST方法，输入可变数量的参数（id必须，与数据库字段保持一致）<br>
返回值：{"code":1,"info":"update success and id is 1"}<br>
{"code":0,"info":"update failed id not exist"}<br>
<br>


7.response/下面的接口<br>
addResponse.php<br>
添加对帖子的回复<br>
用法:POST方法，携带可变数量的参数（名称与数据库字段保持一致）<br>
返回值：{"code":1,"info":"insert response success"}<br>
{"code":0,"info":"insert response fail"}<br>
<br>

queryResponseBase.php<br>
查询回复<br>
用法:POST方法，携带可变数量的参数（名字与数据库保持一致）<br>
返回值：JSON数组<br>
如果查询没有结果的话会返回空的JSON数组。所以请事先判断。<br>
<br>

updateResponse.php<br>
更改评价，所有的update方法都是先根据id去查询，所以POST方法一定要带有id属性<br>
用法：POST方法，输入可变数量的参数（id必须，与数据库字段保持一致）<br>
返回值：{"code":1,"info":"update success and id is 1"}<br>
{"code":0,"info":"update failed id not exist"}<br>
<br>


8.新增的接口（2015-8-29）<br>

job/下面的接口 <br><br>

getAllCategories.php<br>
获取所有帖子分类接口，返回格式为json数组。<br><br>

getJobsByDistance.php<br>
根据当前帖子的距离获取指定距离范围内的所有帖子接口<br>
传入参数 name为post_id(必须传入，当前帖子的id)  ,name为distance（必须传入，指定距离范围，米为单位，如传如1000，则意味着选取1000米范围内的帖子）
name为date（可选，如果不传入默认选择最近30天的，如果传入为3，意味着获取最近3天的数据）<br>
返回数据格式为json数组<br><br>

getRecentJobs.php<br>
根据传入参数获取最近多少天之内发布的帖子。<br>
入参数 name为date（必须，如果不传入默认选择最近3天的，如果传入为7，意味着获取最近7天的数据）<br>
返回数据格式为json数组<br><br>

photo.php<br>
上传帖子图片接口，图片是分开单独上传的，这样统一方便各位同学一起使用。<br>
必须传入的参数是name为post_id（帖子id）的参数，可以上传多张图片，图片（file名字可随意命名），图片校验请客户端同学自行校验。<br>
返回格式是json数组，内容是各个图片的存储相对路径。<br><br>

getJobsAddress.php<br>
获取指定帖子id的所有图片<br>
传入参数name为post_id（必须）<br>
返回是json数组<br><br>

user/下新增两个接口<br>
photo.php<br>
上传用户图片的接口，课同时上传多张图片<br>
传入参数name为nickname（必须）<br>
返回格式为json数组，返回刚刚上传所有图片的相对路径。<br><br>

getUserAddress.php<br>
获取用户上传图片接口。<br>
传入参数为name为nickname（必须）<br>
返回格式为json数组，也就是所有图片地址的相对路径。<br><br>


message/下面新增三个接口<br>
addMessage.php<br>
新增站内信，也就是发送站内信接口。使用方式与以前的接口类似，传入可变数量的key  value，key与数据库字段保持一致。<br><br>

queryMessageBase.php<br>
使用方式类似于以前的查询接口，传入可变参数获取json数组。<br><br>

updateMessage.php<br>
更新站内信接口，一般会用不到。使用方法为传入name为message_id（必须），然后再传入可变数量的key value，字段与数据库保持一致。<br><br>






