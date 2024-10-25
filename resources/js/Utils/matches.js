export const matchProccesor = (game => {
    const prediction = game.predictions.length ? game.predictions[0]:null;
    const awayScore = prediction ? prediction.selection==='X' ? null:prediction.away_score:null;
    const homeScore = prediction ? prediction.selection==='X' ? null:prediction.home_score:null;
    const drawScore = prediction ? prediction.selection==='X' ? prediction.home_score:null:null;
    return {
        game_info: {
            id: game.id,
            status: game.status,
            date: new Date(game.date),
            stage: game.round,
            homeScore: game.home_score,
            awayScore: game.away_score,
            home: game.team_home.name,
            away: game.team_away.name,
            homeIso: game.team_home.iso,
            awayIso: game.team_away.iso,
        },
        selection: game.predictions.length ? game.predictions[0].selection:null,
        homeScore,
        awayScore,
        drawScore,
        points: game.predictions.length ? game.predictions[0].points:null,
        error: null
    }
});
