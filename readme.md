Simple demo with Lumen + Vue.

Running:
1. prepare WEATHER_API_ENDPOINT and WEATHER_API_KEY in backend/.env file,
2. prepare api address in front/src/components/OpenWeatherMap.vue, 61 line,
3. install composer and node dependencies in backend and front,
4. ```docker-compose up```,
5. check localhost:
    backend port: 8088,
    frontend port: 8080.

There are some unit tests in backend app. To run it, go to backend dir and use:
```vendor/bin/phpunit tests/```
