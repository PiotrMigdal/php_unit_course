# Setting Up
<p>docker-compose up --build -d</p>
<p>docker exec -it php_unit_course_web_1 bash</p>
<p>composer require phpunit/phpunit:5.6</p>
<p>composer dump-autoload -o</p>
<p>Alias:</p>
<li>alias phpunit="./vendor/bin/phpunit"</li>

# Important from this course
<ul>
<li>phpunit.xml is settings file where you specify defaults and tests directory</li>
<li>Common practice is naming your directory "tests" and adding "unit" directory</li>
<li>You can create subdirectories based on Models. See tests directory</li>
<li>Test names must be as descriptive as possible and should start with "test" word (alternatively you can add docblock /** @test */)</li>
<li>It is useful to add alias: alias phpunit="./vendor/bin/phpunit"</li>
<li>There are built in function to assert that test passed. You can even test if exception is thrown<</li>
<li>Worth to return your value from method to make sure the test is passed before developing method (i.e. "return 50" if you expect this from test)</li>
<li>You can use dataProviders:</li>
```
    /**
     * @dataProvider urlIsNotValidCases
     * @param $url
     * @return void
     */
    public function testUrlIsNotValid($url): void
    {
        $validator = new Validator($url);
        $this->assertEquals('Url is not valid', $validator->vali());
    }

    /**
     * @return array
     */
    public function urlIsNotValidCases(): array
    {
        return [
            ['maps.googleapis.com?query=true'],
            ['https://?query=true'],
            ['']
        ];
    }
```
</ul>

# Conclusions
<p>Test Drive developments is when you start project from writing your Unit Tests and on this basis you write classes</p>
<p>Looks like php unit are great when you refactor code or make changes in code bases later. See Calculator.php</p>
<p>PHP Units also force you to do OOP</p>


