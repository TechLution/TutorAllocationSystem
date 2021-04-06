//password
const{HtmlOutput}=require("./PasswordFunctions");
test("test the json array to test password of department",()=>{
  var hold =  '{"jobs":[' +
  '{"DEPT_ID":"false"}]}';
  obj = JSON.parse(hold);
  var   htmlString = 'wrong password or username';
  expect(HtmlOutput(obj)).toBe(htmlString);
});

test("test the json array to test password of department if department exist",()=>{
  var hold =  '{"jobs":[' +
  '{"DEPT_ID":"10001"}]}';
  obj = JSON.parse(hold);
  var   htmlString = 'ViewJob.html';
  expect(HtmlOutput(obj)).toBe(htmlString);
});


// student Password
const{sHtmlOutput}=require("./PasswordFunctions");
test("test the json array to test password of student",()=>{
  var hold =  '{"jobs":[' +
  '{"STUDENT_NO":"false"}]}';
  var sNo =1604352;
  obj = JSON.parse(hold);
  var   htmlString = 'Msg["error"]("Incorrect Username or Password. Please Try Again.")';
  expect(sHtmlOutput(obj,sNo)).toBe(htmlString);
});

test("test the json array to test password of student if the student log in",()=>{
  var hold =  '{"jobs":[' +
  '{"STUDENT_NO":"1604352"}]}';
  obj = JSON.parse(hold);
  var sNo = 1604352;
  var   htmlString = 'window.location.assign("index.html")';
  expect(sHtmlOutput(obj,sNo)).toBe(htmlString);
});
