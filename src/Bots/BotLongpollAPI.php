<?php


namespace Sergeich5\Telegram\Bots;


use Sergeich5\Telegram\Callback\CallbackHandler;

class BotLongpollAPI
{
    private string $token;
    private bool $debug = false;
    private int $lastUpdateId = 0;

    function __construct(string $token, bool $debug = false)
    {
        $this->token = $token;
        $this->debug = $debug;
    }

    function getUpdatesLoop(CallbackHandler $callbackHandler)
    {
        while (true) {
            $params = array(
                'offset' => $this->lastUpdateId + 1,
                'limit' => 1,
                'timeout' => 25
            );

            $data = Request::request($this->token, 'getUpdates', $params);
            if (isset($data['ok']) && $data['ok'])
                foreach ($data['result'] as $result) {
                    $this->lastUpdateId = max($this->lastUpdateId, $result['update_id']);

                    if (isset($result['message']))
                        $callbackHandler->messageNew($result['message']);
                    elseif (isset($result['edited_message']))
                        $callbackHandler->messageEdit($result['edited_message']);
                    elseif (isset($result['poll']))
                        $callbackHandler->pollUpdate($result['poll']);
                    elseif (isset($result['poll_answer']))
                        $callbackHandler->pollAnswer($result['poll_answer']);
                    elseif (isset($result['callback_query']))
                        $callbackHandler->callbackQuery($result['callback_query']);
                    else
                        print_r($data);
                }
        }
    }

    private function __request(string $method, array $paramsGet = []) : array
    {
        $url = 'https://api.telegram.org/bot' . $this->token . '/' . $method;

        if (count($paramsGet) > 0)
            $url .= '?'.http_build_query($paramsGet);

        return json_decode(file_get_contents($url), true);
    }
}
