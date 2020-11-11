
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">

<!-- knowl Code -->
<!-- -->

<!-- Sage Cell Code -->
    <link rel="icon" href="http://mathlab.knou.ac.kr:8080/static/favicon.ico">
    <link rel="stylesheet" href="http://mathlab.knou.ac.kr:8080/static/root.css">
    <script src="http://toed.procyan.co.kr/static/jquery.min.js"></script>
    <script src="http://toed.procyan.co.kr/static/embedded_sagecell.js"></script>
<script>
$(function() {
    sagecell.makeSinglecell({
      inputLocation: '.cell_input_print', linked: true,  hide: ['permalink', 'editorToggle','sageMode', 'computationID', 'messages', 'sessionTitle', 'done', 'sessionFilesTitle', 'sessionFiles',  'files', 'sageMode'], autoeval: true,  evalButtonText: 'Question'});});
</script>
<!-- -->

<!-- MathJax Code -->
<!-- <script type="text/javascript" src="http://matrix.skku.ac.kr/2012-mobile/knowl/css/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script> -->
<script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
<script type="text/x-mathjax-config">
MathJax.Hub.Config({
  tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
});
</script>
<!-- -->

<!-- No Right Click -->
<script>
function stop(){
return false;
}
document.oncontextmenu=stop;
</script>
<!-- -->


</head>



<!-- Device width Viewport -->
<meta name="viewport" content="user-scalable=yes, initial-scale=1.0, maxium-scale=2.0, minimum-scale=1.0, width=device-width" />
<!-- -->
    
<p><a knowl="def-symm-skew-symm-matrix.knowl"><img src="def.png"  align="center"> <font style="font-weight:bold; font-size:14px;">대칭 행렬(Symmetrix Matrix), 반대칭 행렬(Skew-symmetrix Matrix)</font></a></p>

<p>&nbsp;&nbsp;&nbsp;<a knowl="ex-symm-skew-symm-matrix1.knowl"><img src="cas.png"  align="center"> <font style="font-weight:bold; font-size:14px;">대칭 행렬과 반대칭 행렬</font></a></p>

    

<div class="cell_input_print">
<script type="text/code">
global answer
import random

var('x, y, z, c1, c2, c3, c4')
c1 = randint(-10, 10)
c2 = randint(3, 8)
c3 = randint(-10, 10)
c4 = randint(-7, -2)
c5 = randint(5, 20)
b = (c1*x^c2 + c3*x^c4)^c5  # 이항
expr = expand(b) # 이항 전개
ls = expr.coefficients(x) # 계수가 0이 아닌 항의 차수와 계수 모음
c = ls[randint(0, len(ls) - 1)] # 계수가 0이 아닌 항의 차수와 계수를 임의로 선택
c6 = c[1]

var('r')
sol = solve(c2*r + c4*(c5 - r) == c6, r)
r0 = sol[0].rhs()

answer = binomial(c5, r0)*c1^r0*c3^(c5 - r0)


answer_calc_list = []
random_answer_calc = random.randint(2,5) #random.choice(answer_calc)
for i in range(4):
    while random_answer_calc in answer_calc_list:
        random_answer_calc = random.randint(2,5)
    answer_calc_list.append(random_answer_calc)

select_answer = [answer-answer_calc_list[0], answer*answer_calc_list[1], answer/answer_calc_list[2], answer+answer_calc_list[3], answer]

random.shuffle(select_answer)

show(html("<p>$\\left(%s\\right)^{%s}$의 전개식에서 $x^{%s}$의 계수는?</p>"%(latex(c1*x^c2 + c3*x^c4), latex(c5), latex(c6))))  # Question

@interact
def _(auto_update=False, answers = selector([(None, ""),(select_answer[0],select_answer[0]), (select_answer[1],select_answer[1]),(select_answer[2],select_answer[2]),(select_answer[3],select_answer[3]),(select_answer[4],select_answer[4])], buttons=True)):
    
    if answer == answers:
        show(html("<p><span style='color:blue'>Correct(정답)</span></p>"))
        
    elif answers == None:
        show(html("<p><span style='color:blue'>Please input your answer in the spaces above.</span></p><p>(위의 빈칸에 답을 입력하고 [Update]버튼을 클릭하세요.)</p>"))
        
    else:
        show(html("<p><span style='color:red'>Incorrect(오답)</span></p> <p>Answer(답안): <br> $\\left(%s\\right)^{%s}$의 전개식에서 $x^{%s}$의 계수는 $\\begin{pmatrix} %s \\\\ %s \\end{pmatrix} \\times (%s)^{%s} \\times (%s)^{%s - %s} = %s$이다."%(latex(c1*x^c2 + c3*x^c4), latex(c5), latex(c6), latex(c5), latex(r0), latex(c1), latex(r0), latex(c3), latex(c5), latex(r0), latex(answer))))
              
</script></div>   


</body>
</html>

<?
echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
   ?>
<style>
   .sagecell_interactcontrolcell table tr td input[type="radio"] {
      position: relative!important;
   }
   .cm-s-default {
   	height:500px!important;
   }
   .CodeMirror-scroll {
   	max-height:700px!important;
   }
   .sagecell_interactcontrolcell table tr td label {
   background-color:transparent!important;
   border:0px solid!important;
   background:none!important;
   }
   body {
   	margin-left:0!important;
   }
   .ui-helper-hidden-accessible{
   	width:30px!important;
   	height:20px!important;
   }
</style>