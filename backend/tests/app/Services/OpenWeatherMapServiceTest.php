<?php
use App\Services\OpenWeatherMapService;
use phpmock\phpunit\PHPMock;

class OpenWeatherMapServiceTest extends TestCase
{
    use PHPMock;

    public function testInstance()
    {
        $service = new OpenWeatherMapService('fake_api_key', 'fake.endpoint.com');
        $this->assertInstanceOf('App\Services\OpenWeatherMapService', $service);
    }

    public function testRequest()
    {
        $curl_exec = $this->getFunctionMock('App\Services', 'curl_exec');
        $curl_exec->expects($this->once())->willReturn(json_encode(['fake_api_output' => 12345]));
        $ch = curl_init();
        $service = new OpenWeatherMapService('fake_api_key', 'fake.endpoint.com');
        $this->assertEquals('{"fake_api_output":12345}', json_encode($service->getData('cityName')));
    }
}