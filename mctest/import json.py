import json
import requests


data = {
        'username': 'webservice',
        'password': 'Ab1234@@',
        'service': 'test_service'
    }
url = "http://localhost/moodle/login/token.php"
token_request = requests.get(url, params=data)
data = {
    'wstoken': token_request.json()['token'],
    'wsfunction': 'local_wstemplate_get_quiz',
    'moodlewsrestformat': 'json',
    'json': '{}'
}
url = "http://localhost/moodle/webservice/rest/server.php"

quiz_data={
            "nomeDoQuiz": "qi3",
            "email":"adm@localhost.com"
        }

data['json'] = json.dumps(quiz_data)
request = requests.post(url, data)

resposta = request.content.decode('utf-8')

# print(resposta)
# print(type(resposta))

dicionario_resposta = json.loads(resposta)

print(dicionario_resposta)
print(type(dicionario_resposta))

dicionario_resposta = json.loads(dicionario_resposta)
print(dicionario_resposta)
print(type(dicionario_resposta))

print (dicionario_resposta['questions'])
print(type(dicionario_resposta['questions']))

questions = dicionario_resposta['questions']

for q in questions:
            mctestid = q["mctestid"]
            print(mctestid)