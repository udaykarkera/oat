# oat
oat interview

Programming expectations and conditions

As a general rule, we want to assess your skills in realistic conditions as you would have on the job. Therefore:
You have internet use it! Consult PHP references, troubleshooting resources, etc.
While the scope of the exercise is small you need to consider this functionality is part of a bigger codebase with a lot of developers expected to understand and augment your code as easily as possible:
Readability: Think about how easy it will be for other developers to take over your code. 
Flexibility/Generalisation: Functional requirements tend to change, data sources might be today a CSV file, tomorrow it might be a json or a mysql database, maybe another REST web service. As a general rule it is important to tackle broader flexibility than the strict requirement
Robustness, things do not always go as expected, right ?
Reutilisation: A framework, A library a code snippet . Yes you can reuse them as long as the re-used component is clearly highlighted to help us distinguishing your own code and re-used components. It is really up to you, maybe do it the way you  would choose if this was a personal project. 
On the outcome/ completeness of the code you will provide. As a general rule we prefer to see a solid foundation start rather than a rushed working solution which do not meet above conditions.
The Exercise

The goal of the exercise is to create a list of test takers (test takers can be seen as users). 

1. _Backend (PHP)_. Create a REST web service that returns a list of _test takers_. You have 2 files that contain data to help you (`testtaker.json` and `testtaker.csv`) to test your service. Both files contain the same data, they are just provided as a potential source to feed your web service
  > Nice to have: As per the generalisation/flexibility, you may want to take into account that the source of the data JSON or CSV might change in the future.


