## [Project-Solento](https://project-solento.stefandejager.nl)

<h5> Creator notes:</h5>
This repository has been created to serve two main purposes. Primarily being a learning process in the world of web development and taking on the challenge of potentially creating something above my weight class. Both of course under the condition to continue as long as it is a fun way to spend free time on.
As I lacked inspiration to build something that could potentially be 'useful', I thought of making a multi player web based game achieve these goals. 

## Build on:

- Laravel Framework
- MySQL back-end
- Bootstrap 
- (Vanilla) JavaScript

## About the game:

<h5> Idea:</h5>
Combining a Trading Card Game with the relaxt style of Management games without forcing the player to spend loads (or any) money in order to have fun with.
The meat of the game would be to configure and collect a group of units for a budget (in game currency) and when the player is happy with their setup, measure it agains other players which are also looking for a match at that time. That last part would conclude the multiplayer part of the game with a 30 second front end sequence providing information on what resulted in the played being the winner or loser in that match and either enjoy the spoils of coping with the loss at the end. 

<h5> Execution:</h5>
Currently (27 Jan 2021) is able to select a faction, collect/buy units and collect/buy items. The items can be equipped to the units in order to provide them with additional stats and other traits. 
The player is not limited to the chosen faction. The faction choice does other things, like making units of that particular faction cheaper for that player, the selected faction can result in advantages/disadvantages on the randomly selected battle ground when a match is 'played'.
Units have basic stats as well as special traits which are specific to that particular unit. 
Before the player has the game start looking for a suitable match, they are able to specifically select which units to select for the battle and assign each unit to its possition on the battle field which plays an imporant factor in the final result. 
When the player is ready to start a match, the game will look for an opponant through short polling. When a match is found, a sequence will be played exactly telling the player what is going on with some flavour text for good measure. The winner will always earn currency and has a percentage chance of collecting an item or even a unit. 

<h5> To do's:</h5>
The the mood strikes and the time allows for it, I would like to have the following things done in order to reach an MVP state:
- Lots of front-end modifications on basically all views in order to make it more intuitively useful and mobile friendly.
- Provide the user with the possibility to sell items (units can already be sold, allthough not for as much as the buying rate)
- Add a lot of units and items then tweak the stats in order to provide loads of options to create lots of 'decks'.

<h5> Potential features: </h5>
Over the last months I have had loads of ideas for additional features that would be fun to play with after reaching the MVP state. Here are some examples. 
- Provide the player with the option to look for a match while playing around with their setup. Currently the player is locked in a 'looking for a match' screen. 
- Add lots more tweaking options. Like more battle field possitions. 
- Have a match play in multiple rounds. Making it slightly more simular to a TCG. 
- Challenge specific other player. 
- Trade units with other players. 


