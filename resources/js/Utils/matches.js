export const matchProccesor = (game => {
    const prediction = game.predictions.length ? game.predictions[0]:null;
    const awayScore = prediction ? prediction.selection==='X' ? null:prediction.away_score:null;
    const homeScore = prediction ? prediction.selection==='X' ? null:prediction.home_score:null;
    const drawScore = prediction ? prediction.selection==='X' ? prediction.home_score:null:null;
    return {
        predictor_game_id: game.id,
        home: game.team_home.name,
        away: game.team_away.name,
        homeIso: game.team_home.iso,
        awayIso: game.team_away.iso,
        date: new Date(game.date),
        stage: game.round,
        selection: game.predictions.length ? game.predictions[0].selection:null,
        homeScore,
        awayScore,
        drawScore,
        error: null
    }
});
