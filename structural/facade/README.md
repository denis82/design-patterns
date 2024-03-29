# Паттерн Facade (фасад)

## Назначение паттерна Facade

- Паттерн Facade предоставляет унифицированный интерфейс вместо набора интерфейсов некоторой подсистемы. Facade определяет интерфейс более высокого уровня, упрощающий использование подсистемы.
- Паттерн Facade "обертывает" сложную подсистему более простым интерфейсом.

## Решаемая проблема

Клиенты хотят получить упрощенный интерфейс к общей функциональности сложной подсистемы.

## Обсуждение паттерна Facade

Паттерн Facade инкапсулирует сложную подсистему в единственный интерфейсный объект. Это позволяет сократить время изучения подсистемы, а также способствует уменьшению степени связанности между подсистемой и потенциально большим количеством клиентов. С другой стороны, если фасад является единственной точкой доступа к подсистеме, то он будет ограничивать возможности, которые могут понадобиться "продвинутым" пользователям.

Объект Facade, реализующий функции посредника, должен оставаться довольно простым и не быть всезнающим "оракулом".
